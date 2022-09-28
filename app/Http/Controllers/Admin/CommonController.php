<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Chatroom;
use App\Models\Message;
use App\Models\News;
use App\Models\DeletedUser;
use Illuminate\Support\Facades\Auth;
use App\Jobs\WarningEmailJob;

class CommonController extends BaseController
{
    public function getUsers(Request $request) {
      $users = User::orderBy('created_at', 'desc')->with('avatars', 'profile')->get();
      return response()->json([
        'users' => $users
      ]);
    }

    public function getUserDetail(Request $request) {
      $user = User::where('id', $request->input('id'))->with('avatars', 'profile')->first();

      return response()->json([
        'user' => $user
      ]);
    }

    public function getContacts(Request $request) {
      $contacts = Contact::orderBy('created_at', 'desc')->with('user')->get();

      return response()->json([
        'contacts' => $contacts
      ]);
    }

    public function sendAnswerProc(Request $request) {
      Contact::where('id', $request->input('id'))->update([
        'answer' => $request->input('content')
      ]);
      $contacts = Contact::orderBy('created_at', 'desc')->with('user')->get();

      return response()->json([
        'contacts' => $contacts
      ]);
    }

    public function getChatrooms(Request $request) {
      $chatrooms = Chatroom::orderBy('created_at', 'desc')->with('participants', 'messages')->get();

      return response()->json([
        'chatrooms' => $chatrooms
      ]);
    }

    public function getMessageList(Request $request) {
      $messages = Message::where('chatroom_id', $request->input('id'))->with('user')->get();

      return response()->json([
        'messages' => $messages
      ]);
    }

    public function blockUser(Request $request) {
      User::where('id', $request->input('user_id'))->update([
        'blocked' => $request->input('status')
      ]);

      $messages = Message::where('chatroom_id', $request->input('id'))->with('user')->get();

      return response()->json([
        'messages' => $messages
      ]);
    }

    public function deleteUser(Request $request) {
      $user = User::where('id', $request->input('id'))->with('avatars', 'profile')->first();
      $avatars = $user->avatars;
      DeletedUser::create([
        'email' => $user->email,
        'avatar' => $avatars[0]->avatar,
        'nickname' => $user->profile->nickname,
        'gender' => $user->profile->gender,
        'age' => $user->profile->age,
        'sexality' => $user->profile->sexality,
        'area' => $user->profile->area,
        'introduction' => $user->profile->introduction
      ]);
      User::where('id', $request->input('id'))->delete();
      $users = User::orderBy('created_at', 'desc')->with('avatars', 'profile')->get();
      return response()->json([
        'users' => $users
      ]);
    }

    public function warningProc(Request $request) {
      $user = User::where('id', $request->input('id'))->first();

      try {
        WarningEmailJob::dispatch($user->email, $request->input('text'));
      } catch (Exception $e) {
        return false;
      }

      return response()->json([
        'flag' => true
      ]);
    }

    public function getNews(Request $request) {
      $news = News::with('user')->orderByDesc('created_at')->get();

      return response()->json([
        'news' => $news
      ]);
    }

    public function createNews(Request $request) {
      News::create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'user_id' => $request->input('user_id'),
      ]);

      return response()->json([
        'flag' => true
      ]);
    }

    public function getNewsEditInit(Request $request) {
      $news = News::where('id', $request->input('id'))->first();
      $users = User::orderBy('created_at', 'desc')->with('avatars', 'profile')->get();

      return response()->json([
        'news' => $news,
        'users' => $users
      ]);
    }

    public function updateNews(Request $request) {
      News::where('id', $request->input('id'))->update([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'user_id' => $request->input('user_id'),
      ]);

      return response()->json([
        'flag' => true
      ]);
    }

    public function getDeletedUsers(Request $request) {
      $users = DeletedUser::orderByDesc('created_at')->get();

      return response()->json([
        'users' => $users
      ]);
    }
}
