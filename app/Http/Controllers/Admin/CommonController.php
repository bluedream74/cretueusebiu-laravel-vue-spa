<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Models\ConsultantAnswer;
use Illuminate\Support\Facades\Auth;
use App\Jobs\WarningEmailJob;

class CommonController extends BaseController
{
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
}
