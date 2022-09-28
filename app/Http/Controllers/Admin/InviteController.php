<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\InviteService;
use App\User;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class InviteController extends BaseController
{
    /**
     * @var InviteService
     */
    protected $service;

    /**
     * InviteController constructor
     * 
     */
    public function __construct(
        InviteService $service
    )
    {
        $this->service = $service;
    }

    public function getInvites() {
        $invites = $this->service->getInvites();

        return response()->json([
            'invites' => $invites
        ]);
    }

    public function deleteInvites(Request $request) {
        $flag = $this->service->deleteInvites($request->input('email'));

        return response()->json([
            'flag' => $flag
        ]);
    }

    public function createInvite(Request $request) {
        $flag = $this->service->createInvite($request->input('email'));

        if ($flag) {
            return response()->json([
                'flag' => $flag
            ]);
        } else {
            return response()->json(['message' => 'エラーが発生しました。'], 422);
        }
    }
}
