<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Traits\FileUpload;
use App\User;
use App\Models\Profile;
use App\Models\Avatar;
use App\Models\DeletedUser;
use Carbon\Carbon;
use App\Jobs\EmailVerification;
use App\Jobs\PasswordReset;
use Laravel\Cashier\Cashier;

class ProfileController extends Controller
{
  use FileUpload;

  public function registerProc(Request $request) {
    $length = 10;
    $token = substr(\str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);

    $data = $request->all();

    $user = User::where('email', $data['email'])->where('is_email_authenticated', 1)->first();

    if (!is_null($user)) {
      return response()->json([
        'status' => 0
      ]);
    }

    User::where('email', $data['email'])->delete();

    $deletedUser = DeletedUser::where('email', $data['email'])->where('created_at', '>=', Carbon::now()->subMonth())->orderByDesc('created_at')->first();

    if (!is_null($deletedUser)) {
      return response()->json([
        'status' => 2
      ]);
    }

    $user = User::create([
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
      'token' => $token,
      'hash' => $token,
      'token_at' => Carbon::now()->addDay()
    ]);
    $profile = Profile::create([
      'user_id' => $user->id,
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
    ]);
    
    try {
      EmailVerification::dispatch($user);
    } catch (Exception $e) {
      return false;
    }

    return response()->json([
      'status' => 1,
      'user_id' => $user->id
    ]);
  }

  public function registerAvatar(Request $request) {
    $avatar_url = $this->uploadFile($request->file('avatar'), 'upload');
    Avatar::create([
      'avatar' => $avatar_url,
      'user_id' => $request->input('user_id')
    ]);

    return response()->json([
      'flag' => true
    ]);
  }

  public function activateEmail(Request $request) {
    $email = $request->input('email');
    $token = $request->input('token');

    $user = User::where('email', $email)->first();
    if(is_null($user)) {
        return response()->json([
            'status' => 0
        ]);
    }
    if (!is_null($user->email_verified_at)) {
        return response()->json([
            'status' => 1
        ]);
    }
    if ($user->token != $token) {
        return response()->json([
            'status' => 2
        ]);
    }
    if ($user->token_at < Carbon::now()) {
        return response()->json([
            'status' => 3
        ]);
    }
    User::where('email', $email)->update([
        'email_verified_at' => Carbon::now(),
        'is_email_authenticated' => 1,
        'token' => null,
        'token_at' => null
    ]);
    $user = User::where('id', $user->id)->first();
    $stripeCustomer = $user->createOrGetStripeCustomer();
    
    if ($user->token_at < Carbon::now()) {
        return response()->json([
            'status' => 4,
            'user_id' => $user->id
        ]);
    }
  }

  public function updateIntroduction(Request $request) {
    Profile::where('user_id', $request->input('user_id'))->update([
      'introduction' => $request->input('introduction')
    ]);

    return response()->json([
      'flag' => true
    ]);
  }

  public function sendPasswordResetEmail(Request $request) {
    $user = User::where('email', $request->input('email'))->first();
    if (is_null($user)) {
      return response()->json([
          'status' => 0
      ]);
    }

    $length = 10;    
    $token = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
    User::where('id', $user->id)->update([
      'token' => $token,
      'token_at' => Carbon::now()->addDay()
    ]);

    $user = User::where('id', $user->id)->first();

    try {
      PasswordReset::dispatch($user);
    } catch (Exception $e) {
      \Log::error($e);
      return false;
    }

    return response()->json([
        'status' => 1
    ]);
  }

  public function resetPassword(Request $request) {
    $user = User::where('email', $request->input('email'))->first();

    if (is_null($user)) {
      return response()->json([
          'status' => 0
      ]);
    }

    if ($user->token_at < Carbon::now()) {
      return response()->json([
          'status' => 1
      ]);
    }

    if ($user->token != $request->input('token')) {
      return response()->json([
          'status' => 2
      ]);
    }

    User::where('id', $user->id)->update([
      'password' => bcrypt($request->input('password')),
      'email_verified_at' => Carbon::now(),
      'is_email_authenticated' => 1,
      'token' => null,
      'token_at' => null
    ]);

    return response()->json([
        'status' => 3
    ]);
  }
}