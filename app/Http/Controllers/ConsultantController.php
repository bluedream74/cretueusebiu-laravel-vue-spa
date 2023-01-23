<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Traits\FileUpload;
use App\User;
use App\Models\AvailableContent;
use App\Models\AvailableJob;
use App\Models\AvailablePrice;
use App\Models\AvailableAmount;
use App\Models\Consultant;
use App\Models\ConsultantConfirm;
use App\Models\ConsultantMiss;
use App\Models\ConsultantOther;
use App\Models\ConsultantAnswer;
use App\Models\News;
use App\Models\Contact;
use App\Models\Banner;
use Carbon\Carbon;
use App\Jobs\EmailVerification;
use App\Jobs\ConsultantEmailJob;
use App\Jobs\ContactFinishEmailJob;
use App\Jobs\PasswordReset;
use App\Jobs\ConsultantAnswerEmailJob;
use Laravel\Cashier\Cashier;

class ConsultantController extends Controller
{
  use FileUpload;

  public function sendConsultantContent(Request $request) {
    $consultant = Consultant::create([
      'com_name' => $request->input('com_name'),
      'job' => $request->input('job'),
      'zipcode' => $request->input('zipcode'),
      'prefecture' => $request->input('prefecture'),
      'city' => $request->input('city'),
      'building' => $request->input('building'),
      'amount' => $request->input('amount'),
      'income' => $request->input('income'),
      'fax' => $request->input('fax'),
      'email' => $request->input('email'),
      'tanto_name' => $request->input('tanto_name'),
      'department_name' => $request->input('department_name'),
      'role_name' => $request->input('role_name'),
      'price' => $request->input('price'),
      'message_title' => $request->input('message_title'),
      'message_content' => $request->input('message_content'),
      'expired_at' => $request->input('expired_at'),
      'available' => 0
    ]);

    foreach($request->input('system_confirms') as $row) {
      ConsultantConfirm::create([
        'consultant_id' => $consultant->id,
        'confirm_id' => $row
      ]);
    }

    foreach($request->input('system_misss') as $row) {
      ConsultantMiss::create([
        'consultant_id' => $consultant->id,
        'miss_id' => $row
      ]);
    }

    foreach($request->input('system_others') as $row) {
      ConsultantOther::create([
        'consultant_id' => $consultant->id,
        'other_id' => $row
      ]);
    }

    $consultant = Consultant::where('id', $consultant->id)->with('confirms', 'misss', 'others', 'answers')->first();
    try {
      ConsultantEmailJob::dispatch($consultant);
    } catch (Exception $e) {
      return false;
    }

    return response()->json([
      'flag' => true
    ]);
  }

  public function getHomeData(Request $request) {
    $consultants = Consultant::where('available', 1)->with('confirms', 'misss', 'others')->orderByDesc('created_at')->get();
    $news = News::orderByDesc('created_at')->where('start_at', '<=', Carbon::now()->format('Y-m-d'))->where(function($query) {
      $query->where('end_at', '>=', Carbon::now()->format('Y-m-d'))
      ->orWhereNull('end_at');
    })->where('is_public', 1)->limit(5)->orderByDesc('created_at')->get();
    $banners = Banner::orderByDesc('created_at')->where('start_at', '<=', Carbon::now()->format('Y-m-d'))->where(function($query) {
      $query->where('end_at', '>=', Carbon::now()->format('Y-m-d'))
      ->orWhereNull('end_at');
    })->where('is_public', 1)->orderByDesc('created_at')->get();

    return response()->json([
      'consultants' => $consultants,
      'news' => $news,
      'banners' => $banners
    ]);
  }

  public function getAllnews(Request $request) {
    $news = News::orderByDesc('created_at')->where('start_at', '<=', Carbon::now()->format('Y-m-d'))->where(function($query) {
      $query->where('end_at', '>=', Carbon::now()->format('Y-m-d'))
      ->orWhereNull('end_at');
    })->orderByDesc('created_at')->get();

    return response()->json([
      'news' => $news
    ]);
  }

  public function getNewsDetail(Request $request) {
    $news = News::where('id', $request->input('id'))->first();
    return response()->json([
      'news' => $news
    ]);
  }

  public function getConsultantList(Request $request) {
    $consultants = Consultant::where('available', 1)->orderByDesc('created_at')->with('confirms', 'misss', 'others')->get();

    return response()->json([
      'consultants' => $consultants
    ]);
  }

  public function getConsultantDetail(Request $request) {
    $consultant = Consultant::where('id', $request->input('id'))->with('confirms', 'misss', 'others')->first();
    return response()->json([
      'consultant' => $consultant
    ]);
  }

  public function sendConsultantAnswer(Request $request) {
    ConsultantAnswer::create([
      'answer' => $request->input('answer'),
      'user_id' => $request->input('user_id'),
      'consultant_id' => $request->input('id')
    ]);



    return response()->json([
      'flag' => true
    ]);
  }

  public function getHistoryList(Request $request) {
    $user_id = $request->user()->id;
    $consultants = Consultant::whereIn('id', function($query) use ($user_id) {
      $query->select('consultant_id')
          ->from(with(new ConsultantAnswer)->getTable())
          ->where('user_id', $user_id);
    })->with('confirms', 'misss', 'others', 'answers')->get();
    return response()->json([
      'consultants' => $consultants
    ]);
  }

  public function getHistoryDetail(Request $request) {
    $consultant = Consultant::where('id', $request->input('id'))->with('confirms', 'misss', 'others', 'answers')->first();
    return response()->json([
      'consultant' => $consultant
    ]);
  }

  public function checkConsultantAnswer(Request $request) {
    $answer = ConsultantAnswer::where('user_id', $request->user()->id)->where('consultant_id', $request->input('id'))->first();
    return response()->json([
      'answer' => $answer
    ]);
  }

  public function sendContact(Request $request) {
    $contact = Contact::create([
      'name' => $request->input('name'),
      'huri_name' => $request->input('huri_name'),
      'email' => $request->input('email'),
      'telephone' => $request->input('telephone'),
      'fax' => $request->input('fax'),
      'content' => $request->input('content'),
    ]);

    try {
      ContactFinishEmailJob::dispatch($contact);
    } catch (Exception $e) {
      return false;
    }

    return response()->json([
      'flag' => true
    ]);
  }

  public function acceptConsultant(Request $request) {
    Consultant::where('id', $request->input('id'))->update([
      'available' => 1
    ]);

    return response()->json([
      'flag' => true
    ]);
  }
}