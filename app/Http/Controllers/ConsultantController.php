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
use Carbon\Carbon;
use App\Jobs\EmailVerification;
use App\Jobs\PasswordReset;
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

    return response()->json([
      'flag' => true
    ]);
  }
}