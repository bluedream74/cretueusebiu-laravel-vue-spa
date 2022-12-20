<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Models\ConsultantAnswer;
use App\Models\ConsultantConfirm;
use App\Models\ConsultantMiss;
use App\Models\ConsultantOther;
use App\Models\AvailableContent;
use App\Models\AvailableJob;
use App\Models\AvailablePrice;
use App\Models\AvailableAmount;
use App\Models\ConsultantKakin;
use App\Models\Consultant;
use App\Models\Koukoku;
use App\Models\News;
use App\Models\Contact;
use App\Models\Master;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use App\Jobs\WarningEmailJob;
use Carbon\Carbon;
use App\Traits\FileUpload;

class CommonController extends BaseController
{
    use FileUpload;
    public function getRegisterList(Request $request) {
      $registers = User::get();

      return response()->json([
        'registers' => $registers
      ]);
    }

    public function getRegisterHistory(Request $request) {
      $histories = ConsultantAnswer::where('user_id', $request->input('id'))->with('consultant')->get();

      return response()->json([
        'histories' => $histories
      ]);
    }

    public function changeAvailable(Request $request) {
      User::where('id', $request->input('id'))->update([
        'available' => $request->input('flag')
      ]);
      return response()->json([
        'flag' => true
      ]);
    }

    public function changeNeedPay(Request $request) {
      User::where('id', $request->input('id'))->update([
        'need_pay' => $request->input('flag')
      ]);
      return response()->json([
        'flag' => true
      ]);
    }

    public function deleteUser(Request $request) {
      User::where('id', $request->input('id'))->delete();
      return response()->json([
        'flag' => true
      ]);
    }

    public function downloadCSV(Request $request) {
      $data = $request->all();
      $targets = json_decode($data['users']);
      $temp = [
        ['認定支援機関ID番号', '会社名', 'フリガナ', '担当者氏名', '部署名', '役職名', '法人／個人事業主', '種別', '会社所在地', '市区町村番地', '建物名・部屋番号など', '電話番号', 'FAX', 'メールアドレス', 'PRポイント', '支援可能内容', '支援可能業種', '支援可能年商', '支援可能従業員規模']
      ];

      $JOB_KINDS = [
        '一般コンサルタント',
        '公認会計士',
        '税理士',
        '中小企業診断士',
        '弁護士',
        '行政書士',
        '司法書士',
        '金融機関',
        'その他'
      ];

      $CONTENTS = [
        '事業再構築補助金',
        'ものづくり補助金',
        '小規模事業者補助金',
        '創業支援',
        '事業承継支援',
        '経営改善計画策定',
        'IT導入補助金',
        '経営力向上計画',
        '先端設備等導入計画',
        '経営革新計画',
        '事業継続力強化計画',
        'その他'
      ];

      $JOBS = [
        '農業、林業',
        '漁業',
        '鉱業、採石業、砂利採取業',
        '建設業',
        '製造業',
        '電気',
        'ガス',
        '熱供給',
        '水道業',
        '情報通信業',
        '運輸業',
        '郵便業',
        '卸売業、小売業',
        '金融業、保険業',
        '不動産業、物品賃貸業',
        '学術研究、専門',
        '技術サービス業',
        '宿泊業、飲食サービス業',
        '生活関連サービス業、娯楽業',
        '教育、学習支援業',
        '医療、福祉',
        '複合サービス事業',
        'サービス業（他に分類されないもの）',
        '公務（他に分類されるものを除く）',
        '分類不能の産業'
      ];

      $PRICES = [
        '5,000万円未満',
        '5,000万円以上3億円未満',
        '3億円以上10億円未満',
        '10億円以上'
      ];

      $AMOUNTS = [
        '5人未満',
        '5～9人',
        '10～29人',
        '30～99人',
        '100～499人',
        '500～999人',
        '1,000人以上'
      ];

      foreach($targets as $user_id) {
        $user = User::where('id', $user_id)->first();
        $available_contents = AvailableContent::where('user_id', $user->id)->get();
        $available_contents_str = "";
        foreach($available_contents as $available_content) {
          $available_contents_str .= $CONTENTS[$available_content->content_id].',';
        }

        $available_jobs = AvailableJob::where('user_id', $user->id)->get();
        $available_jobs_str = "";
        foreach($available_jobs as $available_job) {
          $available_jobs_str .= $JOBS[$available_job->job_id].',';
        }

        $available_prices = AvailablePrice::where('user_id', $user->id)->get();
        $available_prices_str = "";
        foreach($available_prices as $available_price) {
          $available_prices_str .= $PRICES[$available_price->price_id].',';
        }

        $available_amounts = AvailableAmount::where('user_id', $user->id)->get();
        $available_amounts_str = "";
        foreach($available_amounts as $available_amount) {
          $available_amounts_str .= $AMOUNTS[$available_amount->amount_id].',';
        }
        array_push($temp, [$user->kikan_id, $user->com_name, $user->com_huri_name, $user->tanto_name, $user->department_name, $user->role_name, $user->is_personal == 1 ? '個人事業主' : '法人', $JOB_KINDS[$user->kind], $user->prefecture, $user->city, $user->building, $user->telephone, $user->fax, $user->email, $user->introduction, $available_contents_str, $available_jobs_str, $available_prices_str, $available_amounts_str]);
      }
      header('Content-Type: text/plain;charset=UTF-8');
      $stream = fopen('../storage/test.csv', 'w');
      foreach ($temp as $csvRecord) {
        fputcsv($stream, $csvRecord);
      }
      fclose($stream);
      $stream = fopen('../storage/test.csv', 'r');
      header("Content-Type: application/octet-stream");

      $now = new Carbon();
      $filename = 'Register-' . $now->format('Ymdhis') . '.csv';
      header("Content-Disposition: attachment; filename=" . $filename);
      while (!feof($stream)) {
        $content = fread($stream, 1024);
        echo mb_convert_encoding($content, 'SJIS', 'UTF-8');
      }
      fclose($stream);
    }

    public function downloadConsultantsCSV(Request $request) {
      $data = $request->all();
      $targets = json_decode($data['consultants']);

      $SYSTEM_CONFIRM = [
        '事業再構築補助金',
        'ものづくり補助金',
        '小規模事業者補助金',
        '創業支援',
        '事業承継支援',
        '経営改善計画策定',
        'IT導入補助金',
        '経営力向上計画',
        '先端設備等導入計画',
        '経営革新計画',
        '事業継続力強化計画',
      ];

      $SYSTEM_MISS = [
        '設備を導入したい・設備投資をしたい',
        'Webサイトを作りたい・改善したい',
        'ショッピングサイトを作りたい・改善したい',
        '試作品を作りたい',
        '開発したいことがある',
        '生産性を改善したい・作業を効率化したい',
        '人材育成したい・人材確保したい',
        '品質を改善したい',
        '経営を改善したい・経営を革新したい',
        '起業スタートアップを支援してほしい',
        '設備や作業をIT化したい',
        'キャッシュレス化したい・会計ソフトを導入したい',
        '違う事業を始めたい',
        '違う事業に変更したい',
        '会社を譲りたい・事業を譲りたい',
        '会社を買いたい・事業を買いたい',
        '災害や突然の社会情勢変化に強い会社にしたい',
        '他の事業者と連携し新たな取組をしたい',
        '海外展開したい',
        '販路開拓したい'
      ];

      $SYSTEM_OTHER = [
        'その他',
        '連携相談'
      ];

      $JOBS = [
        '農業、林業',
        '漁業',
        '鉱業、採石業、砂利採取業',
        '建設業',
        '製造業',
        '電気',
        'ガス',
        '熱供給',
        '水道業',
        '情報通信業',
        '運輸業',
        '郵便業',
        '卸売業、小売業',
        '金融業、保険業',
        '不動産業、物品賃貸業',
        '学術研究、専門',
        '技術サービス業',
        '宿泊業、飲食サービス業',
        '生活関連サービス業、娯楽業',
        '教育、学習支援業',
        '医療、福祉',
        '複合サービス事業',
        'サービス業（他に分類されないもの）',
        '公務（他に分類されるものを除く）',
        '分類不能の産業'
      ];

      $AMOUNTS = [
        '5人未満',
        '5～9人',
        '10～29人',
        '30～99人',
        '100～499人',
        '500～999人',
        '1,000人以上'
      ];

      $SUPPORT_PRICES = [
        '1,000万円未満',
        '1,000万円以上3,000万円未満',
        '3,000万円以上5,000万円未満',
        '5,000万円以上8,000万円未満',
        '8,000万円以上'
      ];

      $PRICES = [
        '5,000万円未満',
        '5,000万円以上3億円未満',
        '3億円以上10億円未満',
        '10億円以上'
      ];

      $temp = [
        ['ID', '公開・非公開', '登録日時', '相談内容', '会社名', '業種', '会社所在地', '従業員規模', '年商', '電話番号', 'メールアドレス', '担当名', '役職', '投資予定額', '相談内容概略', '相談内容詳細', '掲載期限']
      ];

      foreach($targets as $consultant_id) {
        $consultant = Consultant::where('id', $consultant_id)->first();

        $confirms = ConsultantConfirm::where('consultant_id', $consultant->id)->get();
        $confirms_str = "";
        foreach($confirms as $confirm) {
          $confirms_str .= $SYSTEM_CONFIRM[$confirm->confirm_id].',';
        }

        $misss = ConsultantMiss::where('consultant_id', $consultant->id)->get();
        $misss_str = "";
        foreach($misss as $miss) {
          $misss_str .= $SYSTEM_MISS[$miss->miss_id].',';
        }

        $others = ConsultantOther::where('consultant_id', $consultant->id)->get();
        $others_str = "";
        foreach($others as $other) {
          $others_str .= $SYSTEM_OTHER[$other->other_id].',';
        }
        array_push($temp, [$consultant->id, $consultant->available == 1 ? '公開' : '非公開', $consultant->created_at, $confirms_str.' '.$misss_str.' '.$others_str, $consultant->com_name, $JOBS[$consultant->job], $consultant->prefecture, $AMOUNTS[$consultant->amount], $PRICES[$consultant->income], $consultant->telephone, $consultant->email, $consultant->tanto_name, $consultant->role_name, $SUPPORT_PRICES[$consultant->price], $consultant->message_title , $consultant->message_content, $consultant->expired_at]);
      }

      header('Content-Type: text/plain;charset=UTF-8');
      $stream = fopen('../storage/test.csv', 'w');
      foreach ($temp as $csvRecord) {
        fputcsv($stream, $csvRecord);
      }
      fclose($stream);
      $stream = fopen('../storage/test.csv', 'r');
      header("Content-Type: application/octet-stream");

      $now = new Carbon();
      $filename = 'Consultation-' . $now->format('Ymdhis') . '.csv';
      header("Content-Disposition: attachment; filename=" . $filename);
      while (!feof($stream)) {
        $content = fread($stream, 1024);
        echo mb_convert_encoding($content, 'SJIS', 'UTF-8');
      }
      fclose($stream);
    }

    public function getRegisterInvoices(Request $request) {
      $kakins = ConsultantKakin::where('user_id', $request->input('user_id'))->get();
      $koukokus = Koukoku::where('user_id', $request->input('user_id'))->get();
      return response()->json([
        'kakins' => $kakins,
        'koukokus' => $koukokus
      ]);
    }

    public function addKoukoku(Request $request) {
      Koukoku::create([
        'user_id' => $request->input('user_id'),
        'date' => $request->input('date'),
        'description' => $request->input('description'),
        'amount' => $request->input('amount'),
        'unit' => $request->input('unit'),
        'price' => $request->input('price'),
      ]);

      return response()->json([
        'flag' => true
      ]);
    }

    public function getUserInfo(Request $request) {
      $user_info = User::where('id', $request->input('user_id'))->first();
      $available_contents = AvailableContent::where('user_id', $request->input('user_id'))->get();
      $available_jobs = AvailableJob::where('user_id', $request->input('user_id'))->get();
      $available_amounts = AvailableAmount::where('user_id', $request->input('user_id'))->get();
      $available_prices = AvailablePrice::where('user_id', $request->input('user_id'))->get();

      return response()->json([
        'user_info' => $user_info,
        'available_contents' => $available_contents,
        'available_jobs' => $available_jobs,
        'available_amounts' => $available_amounts,
        'available_prices' => $available_prices,
      ]);
    }

    public function userInfoEdit(Request $request) {
      $data = $request->all();
      User::where('id', $request->input('user_id'))->update([
        'email' => $data['email'],
        'kikan_id' => $request->input('kikan_id'),
        'com_name' => $request->input('com_name'),
        'com_huri_name' => $request->input('com_huri_name'),
        'tanto_name' => $request->input('tanto_name'),
        'department_name' => $request->input('department_name'),
        'role_name' => $request->input('role_name'),
        'is_personal' => $request->input('is_personal'),
        'kind' => $request->input('kind'),
        'zipcode' => $request->input('zipcode'),
        'prefecture' => $request->input('prefecture'),
        'city' => $request->input('city'),
        'building' => $request->input('building'),
        'telephone' => $request->input('telephone'),
        'fax' => $request->input('fax'),
        'introduction' => $request->input('introduction'),
        'available' => $request->input('available'),
        'need_pay' => $request->input('need_pay'),
      ]);

      AvailableContent::where('user_id', $request->input('user_id'))->delete();
      foreach($request->input('available_contents') as $content_id) {
        AvailableContent::create([
          'user_id' => $request->input('user_id'),
          'content_id' => $content_id
        ]);
      }
  
      AvailableJob::where('user_id', $request->input('user_id'))->delete();
      foreach($request->input('available_jobs') as $job_id) {
        AvailableJob::create([
          'user_id' => $request->input('user_id'),
          'job_id' => $job_id
        ]);
      }
  
      AvailablePrice::where('user_id', $request->input('user_id'))->delete();
      foreach($request->input('available_prices') as $price_id) {
        AvailablePrice::create([
          'user_id' => $request->input('user_id'),
          'price_id' => $price_id
        ]);
      }
  
      AvailableAmount::where('user_id', $request->input('user_id'))->delete();
      foreach($request->input('available_amounts') as $amount_id) {
        AvailableAmount::create([
          'user_id' => $request->input('user_id'),
          'amount_id' => $amount_id
        ]);
      }

      return response()->json([
        'flag' => true
      ]);
    }

    public function getNewsList(Request $request) {
      $news = News::get();
      
      return response()->json([
        'news' => $news
      ]); 
    }

    public function getBannerList(Request $request) {
      $banners = Banner::get();
      
      return response()->json([
        'banners' => $banners
      ]); 
    }

    public function deleteNewsProc(Request $request) {
      News::where('id', $request->input('id'))->delete();

      return response()->json([
        'flag' => true
      ]);
    }

    public function changeNewsPublic(Request $request) {
      News::where('id', $request->input('id'))->update([
        'is_public' => $request->input('flag')
      ]);

      return response()->json([
        'flag' => true
      ]);
    }

    public function changeBannerPublic(Request $request) {
      Banner::where('id', $request->input('id'))->update([
        'is_public' => $request->input('flag')
      ]);

      return response()->json([
        'flag' => true
      ]);
    }

    public function deleteBannerProc(Request $request) {
      Banner::where('id', $request->input('id'))->delete();

      return response()->json([
        'flag' => true
      ]);
    }

    public function createNews(Request $request) {
      if ($request->file('pdf') != 'null' && $request->file('pdf') != null) {
        $pdf_url = $this->uploadCommon($request->file('pdf'), 'upload');
      } else {
        $pdf_url = null;
      }
      
      News::create([
        'is_public' => intval($request->input('is_public')),
        'start_at' => $request->input('start_at') == 'null' || $request->input('start_at') == null ? null : $request->input('start_at'),
        'end_at' => $request->input('end_at') == 'null' || $request->input('end_at') == null ? null : $request->input('end_at'),
        'title' => $request->input('title') == 'null' ? null : $request->input('title'),
        'url' => $request->input('url') == 'null' ? null : $request->input('url'),
        'pdf' => $pdf_url,
        'pdf_title' => $request->input('pdf_title') == 'null' ? null : $request->input('pdf_title'),
        'content' => $request->input('content') == 'null' ? null : $request->input('content'),
      ]);
    }

    public function createBanner(Request $request) {
      if ($request->file('image') != 'null' && $request->file('image') != null) {
        $image_url = $this->uploadFile($request->file('image'), 'upload');
      } else {
        $image_url = null;
      }
      
      Banner::create([
        'is_public' => intval($request->input('is_public')),
        'start_at' => $request->input('start_at') == 'null' || $request->input('start_at') == null ? null : $request->input('start_at'),
        'end_at' => $request->input('end_at') == 'null' || $request->input('end_at') == null ? null : $request->input('end_at'),
        'title' => $request->input('title') == 'null' ? null : $request->input('title'),
        'link' => $request->input('link') == 'null' ? null : $request->input('link'),
        'image' => $image_url
      ]);
    }

    public function getNewsDetail(Request $request) {
      $news = News::where('id', $request->input('id'))->first();
      return response()->json([
        'news' => $news
      ]);
    }

    public function getBannerDetail(Request $request) {
      $banner = Banner::where('id', $request->input('id'))->first();
      return response()->json([
        'banner' => $banner
      ]);
    }

    public function updateNews(Request $request) {
      if ($request->file('pdf') != 'null' && $request->file('pdf') != null) {
        $pdf_url = $this->uploadCommon($request->file('pdf'), 'upload');

        News::where('id', $request->input('id'))->update([
          'is_public' => intval($request->input('is_public')),
          'start_at' => $request->input('start_at') == 'null' || $request->input('start_at') == null ? null : $request->input('start_at'),
          'end_at' => $request->input('end_at') == 'null' || $request->input('end_at') == null ? null : $request->input('end_at'),
          'title' => $request->input('title') == 'null' ? null : $request->input('title'),
          'url' => $request->input('url') == 'null' ? null : $request->input('url'),
          'pdf' => $pdf_url,
          'pdf_title' => $request->input('pdf_title') == 'null' ? null : $request->input('pdf_title'),
          'content' => $request->input('content') == 'null' ? null : $request->input('content'),
        ]);
      } else {
        $pdf_url = null;

        News::where('id', $request->input('id'))->update([
          'is_public' => intval($request->input('is_public')),
          'start_at' => $request->input('start_at') == 'null' || $request->input('start_at') == null ? null : $request->input('start_at'),
          'end_at' => $request->input('end_at') == 'null' || $request->input('end_at') == null ? null : $request->input('end_at'),
          'title' => $request->input('title') == 'null' ? null : $request->input('title'),
          'url' => $request->input('url') == 'null' ? null : $request->input('url'),
          'pdf_title' => $request->input('pdf_title') == 'null' ? null : $request->input('pdf_title'),
          'content' => $request->input('content') == 'null' ? null : $request->input('content'),
        ]);
      }
    }

    public function updateBanner(Request $request) {
      if ($request->file('image') != null) {
        $image_url = $this->uploadFile($request->file('image'), 'upload');
        \Log::error($image_url);

        Banner::where('id', $request->input('id'))->update([
          'is_public' => intval($request->input('is_public')),
          'start_at' => $request->input('start_at') == 'null' || $request->input('start_at') == null ? null : $request->input('start_at'),
          'end_at' => $request->input('end_at') == 'null' || $request->input('end_at') == null ? null : $request->input('end_at'),
          'title' => $request->input('title') == 'null' ? null : $request->input('title'),
          'link' => $request->input('link') == 'null' ? null : $request->input('link'),
          'image' => $image_url
        ]);
      } else {
        $image_url = null;

        Banner::where('id', $request->input('id'))->update([
          'is_public' => intval($request->input('is_public')),
          'start_at' => $request->input('start_at') == 'null' || $request->input('start_at') == null ? null : $request->input('start_at'),
          'end_at' => $request->input('end_at') == 'null' || $request->input('end_at') == null ? null : $request->input('end_at'),
          'title' => $request->input('title') == 'null' ? null : $request->input('title'),
          'link' => $request->input('link') == 'null' ? null : $request->input('link'),
        ]);
      }
    }

    public function getConsultantList(Request $request) {
      $consultants = Consultant::with('confirms', 'misss', 'others', 'answers')->get();
      return response()->json([
        'consultants' => $consultants
      ]);
    }

    public function changeConsultantAvailable(Request $request) {
      Consultant::where('id', $request->input('id'))->update([
        'available' => $request->input('flag')
      ]);
      return response()->json([
        'flag' => true
      ]);
    }

    public function deleteConsultant(Request $request) {
      Consultant::where('id', $request->input('id'))->delete();
      return response()->json([
        'flag' => true
      ]);
    }

    public function getConsultantInfo(Request $request) {
      $consultant = Consultant::where('id', $request->input('id'))->with('confirms', 'misss', 'others', 'answers')->first();
      return response()->json([
        'consultant' => $consultant
      ]);
    }

    public function saveConsultantContent(Request $request) {
      Consultant::where('id', $request->input('id'))->update([
        'com_name' => $request->input('com_name'),
        'job' => $request->input('job'),
        'zipcode' => $request->input('zipcode'),
        'prefecture' => $request->input('prefecture'),
        'city' => $request->input('city'),
        'building' => $request->input('building'),
        'amount' => $request->input('amount'),
        'income' => $request->input('income'),
        'fax' => $request->input('fax'),
        'tanto_name' => $request->input('tanto_name'),
        'telephone' => $request->input('telephone'),
        'department_name' => $request->input('department_name'),
        'role_name' => $request->input('role_name'),
        'price' => $request->input('price'),
        'message_title' => $request->input('message_title'),
        'message_content' => $request->input('message_content'),
        'available' => $request->input('available'),
      ]);

      ConsultantConfirm::where('consultant_id', $request->input('id'))->delete();
      ConsultantMiss::where('consultant_id', $request->input('id'))->delete();
      ConsultantOther::where('consultant_id', $request->input('id'))->delete();

      foreach($request->input('system_confirms') as $row) {
        ConsultantConfirm::create([
          'consultant_id' => $request->input('id'),
          'confirm_id' => $row
        ]);
      }
  
      foreach($request->input('system_misss') as $row) {
        ConsultantMiss::create([
          'consultant_id' => $request->input('id'),
          'miss_id' => $row
        ]);
      }
  
      foreach($request->input('system_others') as $row) {
        ConsultantOther::create([
          'consultant_id' => $request->input('id'),
          'other_id' => $row
        ]);
      }

      return response()->json([
        'flag' => true
      ]);
    }

    public function getBillingData(Request $request) {
      $master = Master::first();

      return response()->json([
        'master' => $master
      ]);
    }

    public function saveMaster(Request $request) {
      Master::where('id', 1)->update([
        'price' => $request->input('price'),
        'special_price' => $request->input('special_price'),
        'from' => $request->input('from'),
        'to' => $request->input('to'),
      ]);

      return response()->json([
        'flag' => true
      ]);
    }

    public function downloadContactCSV(Request $request) {
      $temp = [
        ['問い合わせ日時', '氏名', 'フリガナ', 'メールアドレス', '電話番号', 'FAX', 'お問合せ内容']
      ];

      $contacts = Contact::orderByDesc('created_at')->get();
      foreach($contacts as $contact) {
        array_push($temp, [
          $contact->created_at->format('Y/m/d'), $contact->name, $contact->huri_name, $contact->email, $contact->telephone, $contact->fax, $contact->content
        ]);
      }
      header('Content-Type: text/plain;charset=UTF-8');
      $stream = fopen('../storage/test.csv', 'w');
      foreach ($temp as $csvRecord) {
        fputcsv($stream, $csvRecord);
      }
      fclose($stream);
      $stream = fopen('../storage/test.csv', 'r');
      header("Content-Type: application/octet-stream");

      $now = new Carbon();
      $filename = 'Contact-' . $now->format('Ymdhis') . '.csv';
      header("Content-Disposition: attachment; filename=" . $filename);
      while (!feof($stream)) {
        $content = fread($stream, 1024);
        echo mb_convert_encoding($content, 'SJIS', 'UTF-8');
      }
      fclose($stream);
    }

    public function downloadInvoiceData(Request $request) {
      $data = $request->all();
      $kakins = ConsultantKakin::whereYear('created_at', '=', $data['year'])->whereMonth('created_at', $data['month'])->get();

      $temp = [
        ['相談ID', 'ユーザーID']
      ];

      foreach($kakins as $kakin) {
        array_push($temp, [
          $kakin->consultant_id, $kakin->user_id
        ]);
      }

      header('Content-Type: text/plain;charset=UTF-8');
      $stream = fopen('../storage/請求情報CSV.csv', 'w');
      foreach ($temp as $csvRecord) {
        fputcsv($stream, $csvRecord);
      }
      fclose($stream);
      $stream = fopen('../storage/請求情報CSV.csv', 'r');
      header("Content-Type: application/octet-stream");

      $now = new Carbon();
      $filename = 'Contact-' . $now->format('Ymdhis') . '.csv';
      header("Content-Disposition: attachment; filename=" . $filename);
      while (!feof($stream)) {
        $content = fread($stream, 1024);
        echo mb_convert_encoding($content, 'SJIS', 'UTF-8');
      }
      fclose($stream);
    }
}
