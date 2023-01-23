<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Traits\FileUpload;
use App\Models\History;
use App\Models\HorseHistory;
use App\User;
use App\Models\News;
use App\Models\Profile;
use App\Models\Condition;
use App\Models\Block;
use App\Models\Subscription;
use App\Models\ChatroomParticipant;
use App\Models\Chatroom;
use App\Models\Message;
use App\Models\Avatar;
use App\Models\Favorite;
use App\Models\Contact;
use App\Jobs\Taikai1EmailJob;
use App\Jobs\ContactEmailJob;
use App\Jobs\Taikai2EmailJob;

class CommonController extends Controller
{
  use FileUpload;

  public function getHomeData(Request $request) {
    $user = $request->user();
    $news = News::where('user_id', $user->id)->where('readed', '==', 0)->orderByDesc('created_at')->get();

    return response()->json([
      'news' => $news
    ]);
  }

  public function saveSearchCondition(Request $request) {
    $condition = Condition::where('user_id', $request->user()->id)->first();

    if (isset($condition)) {
      $condition->age_min = $request->input('age_min');
      $condition->age_max = $request->input('age_max');
      $condition->sexality = $request->input('selectedSexalities');
      $condition->area = $request->input('selectedAreas');
      $condition->height_min = $request->input('height_min');
      $condition->height_max = $request->input('height_max');
      $condition->body_type = $request->input('selectedBodyTypes');
      $condition->job = $request->input('selectedJobs');
      $condition->holiday = $request->input('selectedHolidays');
      $condition->salary = $request->input('selectedSalaries');
      $condition->study = $request->input('selectedStudies');
      $condition->liquor = $request->input('selectedLiquors');
      $condition->tobacco = $request->input('selectedTobaccos');
      $condition->partner = $request->input('selectedPartners');
      $condition->history = $request->input('selectedHistories');
      $condition->style = $request->input('selectedStyles');
      $condition->child = $request->input('selectedChilds');

      $condition->save();
    } else {
      Condition::create([
        'user_id' => $request->user()->id,
        'age_min' => $request->input('age_min'),
        'age_max' => $request->input('age_max'),
        'sexality' => $request->input('selectedSexalities'),
        'area' => $request->input('selectedBodyTypes'),
        'height_min' => $request->input('height_min'),
        'height_max' => $request->input('height_max'),
        'body_type' => $request->input('selectedBodyTypes'),
        'job' => $request->input('selectedJobs'),
        'holiday' => $request->input('selectedHolidays'),
        'salary' => $request->input('selectedSalaries'),
        'study' => $request->input('selectedStudies'),
        'liquor' => $request->input('selectedLiquors'),
        'tobacco' => $request->input('selectedTobaccos'),
        'partner' => $request->input('selectedPartners'),
        'history' => $request->input('selectedHistories'),
        'style' => $request->input('selectedStyles'),
        'child' => $request->input('selectedChilds'),
      ]);
    }

    return response()->json([
      'flag' => true
    ]);
  }

  public function searchMatchingUsers(Request $request) {
    $condition = Condition::where('user_id', $request->user()->id)->first();
    $user = $request->user();
    $gender = $user->profile->gender;

    if (isset($condition)) {
      $users = User::whereNotNull('email_verified_at')->where('id', '!=', $request->user()->id)->whereIn('id', function($query) use ($condition, $gender) {
        $query->select('user_id')
        ->from(with(new Profile)->getTable());
        
        // 年齢
        $query->where('age', '>=', $condition->age_min - 18);
        $query->where('age', '<=', $condition->age_max - 18);


        $query->where('gender', '!=', $gender);

        // セクシャリティ
        $sexality = $condition->sexality;
        if (isset($sexality)) {
          $query->whereIn('sexality', explode(" ", $sexality));
        }

        // 住んでいる地域
        $area = $condition->area;
        if (isset($area)) {
          $query->whereIn('area', explode(" ", $area));
        }

        // 体型
        $body_type = $condition->body_type;
        if (isset($body_type)) {
          $query->whereIn('body_type', explode(" ", $body_type));
        }

        // 職業
        $job = $condition->job;
        if (isset($job)) {
          $query->whereIn('job', explode(" ", $job));
        }

        // 休日
        $holiday = $condition->holiday;
        if (isset($holiday)) {
          $query->whereIn('holiday', explode(" ", $holiday));
        }

        // 年収
        $salary = $condition->salary;
        if (isset($salary)) {
          $query->whereIn('salary', explode(" ", $salary));
        }

        // 最終学歴
        $study = $condition->study;
        if (isset($study)) {
          $query->whereIn('study', explode(" ", $study));
        }

        // お酒
        $liquor = $condition->liquor;
        if (isset($liquor)) {
          $query->whereIn('liquor', explode(" ", $liquor));
        }

        // たばこ
        $tobacco = $condition->tobacco;
        if (isset($tobacco)) {
          $query->whereIn('tobacco', explode(" ", $tobacco));
        }

        // パートナー
        $partner = $condition->partner;
        if (isset($partner)) {
          $query->whereIn('partner', explode(" ", $partner));
        }

        // 結婚歴
        $history = $condition->history;
        if (isset($history)) {
          $query->whereIn('history', explode(" ", $history));
        }

        // 結婚後の希望スタイル
        $style = $condition->style;
        if (isset($style)) {
          $query->whereIn('style', explode(" ", $style));
        }

        // 子供の希望有無
        $child = $condition->child;
        if (isset($child)) {
          $query->whereIn('child', explode(" ", $child));
        }
      })->with('profile', 'avatars')->get();
    } else {
      $users = User::whereNotNull('email_verified_at')->where('id', '!=', $request->user()->id)->whereIn('id', function($query) use ($condition, $gender) {
        $query->select('user_id')
        ->from(with(new Profile)->getTable());
        $query->where('gender', '!=', $gender);
      })->with('profile', 'avatars')->get();
    }

    return response()->json([
      'users' => $users
    ]);
  }

  public function getCondition(Request $request) {
    $condition = Condition::where('user_id', $request->user()->id)->first();

    return response()->json([
      'condition' => $condition
    ]);
  }

  public function getUserDetail(Request $request) {
    $user = User::where('id', $request->input('id'))->with('profile', 'avatars')->first();
    $block = Block::where('user_id', $request->user()->id)->where('target_id', $request->input('id'))->first();

    return response()->json([
      'user' => $user,
      'block' => $block
    ]);
  }

  public function blockUser(Request $request) {
    if ($request->input('flag') == true) {
      Block::where('user_id', $request->user()->id)->where('target_id', $request->input('id'))->delete();
    } else {
      Block::create([
        'user_id' => $request->user()->id,
        'target_id' => $request->input('id')
      ]);
    }
    $block = Block::where('user_id', $request->user()->id)->where('target_id', $request->input('id'))->first();

    return response()->json([
      'block' => $block
    ]);
  }

  public function getChatroomList(Request $request) {
    $user_id = $request->user()->id;
    $chatrooms = Chatroom::whereIn('id', function($query) use ($user_id) {
      $query->select('chatroom_id')
        ->from(with(new ChatroomParticipant)->getTable())
        ->where('user_id', $user_id);
    })->with('messages', 'participants')->get();

    return response()->json([
      'chatrooms' => $chatrooms
    ]);
  }

  public function checkAndCreateChatroom(Request $request) {
    $user_id = $request->user()->id;
    $target_id = $request->input('user_id');
    $chatroom = Chatroom::whereIn('id', function($query) use ($user_id) {
      $query->select('chatroom_id')
        ->from(with(new ChatroomParticipant)->getTable())
        ->where('user_id', $user_id);
    })->whereIn('id', function($query) use ($target_id) {
      $query->select('chatroom_id')
        ->from(with(new ChatroomParticipant)->getTable())
        ->where('user_id', $target_id);
    })->first();

    if (is_null($chatroom)) {
      $chatroom = Chatroom::create([
        'firebaseKey' => $request->input('firebaseKey')
      ]);
      ChatroomParticipant::create([
        'chatroom_id' => $chatroom->id,
        'user_id' => $user_id
      ]);
      ChatroomParticipant::create([
        'chatroom_id' => $chatroom->id,
        'user_id' => $target_id
      ]);
    }

    return response()->json([
      'chatroom_id' => $chatroom->id
    ]);
  }

  public function getMessageList(Request $request) {
    $messages = Message::where('chatroom_id', $request->input('id'))->with('user')->get();
    foreach($messages as $message) {
      $read_flags = $message->read_flags;
      $read_flag_arr = \explode('  ', $read_flags);
      if (!\in_array($request->user()->id, $read_flag_arr)) {
        array_push($read_flag_arr, $request->user()->id);
      }
      $temp = "";
      foreach($read_flag_arr as $item) {
        $temp .= " " . $item . " ";
      }
      $message->read_flags = trim($temp);
      $message->save();
    }
    $messages = Message::where('chatroom_id', $request->input('id'))->with('user')->get();
    $chatroom_info = Chatroom::where('id', $request->input('id'))->with('participants')->first();

    return response()->json([
      'messages' => $messages,
      'chatroom_info' => $chatroom_info
    ]);
  }

  public function sendMessage(Request $request) {
    $message = Message::create([
      'content' => $request->input('content'),
      'sender_id' => $request->user()->id,
      'chatroom_id' => $request->input('chatroom_id'),
      'read_flags' => $request->input('read_flags'),
    ]);
    $chatroom_participant = ChatroomParticipant::where('chatroom_id', $request->input('chatroom_id'))->where('user_id', '!=',$request->user()->id)->first();
    $message = Message::where('id', $message->id)->with('user')->first();
    $profile = Profile::where('user_id', $request->user()->id)->first();
    News::create([
      'content' => $request->input('content'),
      'user_id' => $chatroom_participant->user_id,
      'title' => $profile->nickname.'さんからメッセージが届きました。'
    ]);

    return response()->json([
      'message' => $message
    ]);
  }

  public function favoriteProc(Request $request) {
    if ($request->input('liked') == true) {
      Favorite::create([
        'user_id' => $request->user()->id,
        'target_id' => $request->input('target_id')
      ]);
    } else {
      Favorite::where('user_id', $request->user()->id)->where('target_id', $request->input('target_id'))->delete();
    }

    return response()->json([
      'flag' => true
    ]);
  }

  public function profileEditProc(Request $request) {
    $user_id = $request->user()->id;
    $data = $request->all();
    $delete_files = $request->input('delete_files');
    if (!is_null($delete_files)) {
      foreach(\explode('  ', $delete_files) as $item) {
        Avatar::where('user_id', $user_id)->where('id', $item)->delete();
      }
    }

    Profile::where('user_id', $user_id)->update([
      'nickname' => $data['nickname'],
      'gender' => $data['gender'],
      'age' => $data['age'],
      'sexality' => $data['sexality'],
      'area' => $data['area'],
      'height' => !is_null($request->input('height')) && $request->input('height') != 'null' ? $request->input('height') : null,
      'body_type' => !is_null($request->input('body_type')) && $request->input('body_type') != 'null' ? $request->input('body_type') : null,
      'job' => !is_null($request->input('job')) && $request->input('job') != 'null' ? $request->input('job') : null,
      'holiday' => !is_null($request->input('holiday')) && $request->input('holiday') != 'null' ? $request->input('holiday') : null,
      'salary' => !is_null($request->input('salary')) && $request->input('salary') != 'null' ? $request->input('salary') : null,
      'study' => !is_null($request->input('study')) && $request->input('study') != 'null' ? $request->input('study') : null,
      'liquor' => !is_null($request->input('liquor')) && $request->input('liquor') != 'null' ? $request->input('liquor') : null,
      'tobacco' => !is_null($request->input('tobacco')) && $request->input('tobacco') != 'null' ? $request->input('tobacco') : null,
      'partner' => !is_null($request->input('partner')) && $request->input('partner') != 'null' ? $request->input('partner') : null,
      'history' => !is_null($request->input('history')) && $request->input('history') != 'null' ? $request->input('history') : null,
      'style' => !is_null($request->input('style')) && $request->input('style') != 'null' ? $request->input('style') : null,
      'child' => !is_null($request->input('child')) && $request->input('child') != 'null' ? $request->input('child') : null,
      'introduction' => !is_null($request->input('introduction')) && $request->input('introduction') != 'null' ? $request->input('introduction') : null
    ]);

    return response()->json([
      'flag' => true
    ]);
  }

  public function contactProc(Request $request) {
    Contact::create([
      'user_id' => is_null(Auth::user()) ? null : Auth::user()->id,
      'email' => $request->input('email'),
      'nickname' => $request->input('nickname'),
      'content' => $request->input('content')
    ]);

    try {
      ContactEmailJob::dispatch($request->input('content'), $request->input('email'), $request->input('nickname'));
    } catch (Exception $e) {
      return false;
    }

    return response()->json([
      'flag' => true
    ]);
  }

  public function getNewsList(Request $request) {
    $news = News::whereNull('user_id')->get();

    return response()->json([
      'news' => $news
    ]);
  }

  public function taikai2(Request $request) {
    try {
      Taikai2EmailJob::dispatch($request->user()->email);
    } catch (Exception $e) {
      return false;
    }
    $user = $request->user();
    $user->subscription('default')->cancel();
    User::where('id', $request->user()->id)->delete();

    return response()->json([
      'flag' => true
    ]);
  }

  public function taikai1(Request $request) {
    $user = $request->user();
    $user->subscription('default')->cancel();
    $user->role = 1;
    $user->plan = NULL;
    $user->save();

    try {
      Taikai1EmailJob::dispatch($user->email);
    } catch (Exception $e) {
      return false;
    }

    return response()->json([
      'flag' => true
    ]);
  }

  public function getPlanInfo(Request $request) {
    $user = $request->user();
    $subscription = Subscription::where('user_id', $user->id)->first();

    return response()->json([
      'intent' => $user->createSetupIntent(),
      'subscription' => $subscription
    ]);
  }

  public function savePaymentMethod(Request $request) {
    $user = $request->user();
    $user->addPaymentMethod($request->input('payment_method'));

    if ($request->input('currentPlan') == 1) {
      $price = 'price_1Kw4RRCFqxHSXgZ1KCN0SjMQ';
    } else {
      $price = 'price_1KwD7PCFqxHSXgZ1WH54X753';
    }
    $user->newSubscription('default', $price)->create($request->input('payment_method'));
    $user->role = 2;
    $user->plan = $request->input('currentPlan');
    $user->save();

    return response()->json([
      'flag' => true
    ]);
  }

  public function getNewsDetail(Request $request) {
    $news = News::where('id', $request->input('id'))->first();

    if (!is_null($news->user_id)) {
      $news->readed = 1;
      $news->save();
    }

    return response()->json([
      'news' => $news
    ]);
  }
}