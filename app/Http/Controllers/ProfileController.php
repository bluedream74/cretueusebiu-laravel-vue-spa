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
use App\Models\Koukoku;
use App\Models\ConsultantKakin;
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

    $temp_user = User::where('kikan_id', $request->input('kikan_id'))->first();

    if (!is_null($temp_user)) {
      return response()->json([
        'status' => 3
      ]);
    }

    User::where('email', $data['email'])->delete();

    $user = User::create([
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
      'token' => $token,
      'token_at' => Carbon::now()->addDay(),
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
    ]);

    foreach($request->input('available_contents') as $content_id) {
      AvailableContent::create([
        'user_id' => $user->id,
        'content_id' => $content_id
      ]);
    }

    foreach($request->input('available_jobs') as $job_id) {
      AvailableJob::create([
        'user_id' => $user->id,
        'job_id' => $job_id
      ]);
    }

    foreach($request->input('available_prices') as $price_id) {
      AvailablePrice::create([
        'user_id' => $user->id,
        'price_id' => $price_id
      ]);
    }

    foreach($request->input('available_amounts') as $amount_id) {
      AvailableAmount::create([
        'user_id' => $user->id,
        'amount_id' => $amount_id
      ]);
    }
    
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

  public function getProfileInfo(Request $request) {
    $profile = User::where('id', $request->user()->id)->with('available_contents', 'available_jobs', 'available_prices', 'available_amounts')->first();
    return response()->json([
      'profile' => $profile
    ]);
  }

  public function updateProfileInfo(Request $request) {
    $data = $request->all();

    User::where('id', $request->user()->id)->update([
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
    ]);

    AvailableContent::where('user_id', $request->user()->id)->delete();
    AvailableJob::where('user_id', $request->user()->id)->delete();
    AvailablePrice::where('user_id', $request->user()->id)->delete();
    AvailableAmount::where('user_id', $request->user()->id)->delete();
    $user = User::where('id', $request->user()->id)->first();

    foreach($request->input('available_contents') as $content_id) {
      AvailableContent::create([
        'user_id' => $user->id,
        'content_id' => $content_id
      ]);
    }

    foreach($request->input('available_jobs') as $job_id) {
      AvailableJob::create([
        'user_id' => $user->id,
        'job_id' => $job_id
      ]);
    }

    foreach($request->input('available_prices') as $price_id) {
      AvailablePrice::create([
        'user_id' => $user->id,
        'price_id' => $price_id
      ]);
    }

    foreach($request->input('available_amounts') as $amount_id) {
      AvailableAmount::create([
        'user_id' => $user->id,
        'amount_id' => $amount_id
      ]);
    }

    return response()->json([
      'flag' => true
    ]);
  }

  public function updatePassword(Request $request) {
    $user = $request->user();
    $user->password = bcrypt($request->input('password'));
    $user->save();

    return response()->json([
      'flag' => true
    ]);
  }

  public function getMatchingList(Request $request) {
    $consultants = Consultant::where('available', 1)->with('confirms', 'misss', 'others')->get();
    $available_amounts = AvailableAmount::where('user_id', $request->user()->id)->get();
    $available_contents = AvailableContent::where('user_id', $request->user()->id)->get();
    $available_jobs = AvailableJob::where('user_id', $request->user()->id)->get();
    $available_prices = AvailablePrice::where('user_id', $request->user()->id)->get();
    $consultant_kakins = ConsultantKakin::where('user_id', $request->user()->id)->get();
    return response()->json([
      'consultants' => $consultants,
      'available_amounts' => $available_amounts,
      'available_contents' => $available_contents,
      'available_jobs' => $available_jobs,
      'available_prices' => $available_prices,
      'consultant_kakins' => $consultant_kakins
    ]);
  }

  public function agreeKakin(Request $request) {
    ConsultantKakin::create([
      'consultant_id' => $request->input('consultant_id'),
      'user_id' => $request->user()->id,
    ]);

    return response()->json([
      'flag' => true
    ]);
  }

  public function getAllInvoices(Request $request) {
    $consultant_kakins = ConsultantKakin::where('user_id', $request->user()->id)->orderByDesc('created_at')->get();
    $koukokus = Koukoku::where('user_id', $request->user()->i)->get();

    return response()->json([
      'consultant_kakins' => $consultant_kakins,
      'koukokus' => $koukokus
    ]);
  }
}