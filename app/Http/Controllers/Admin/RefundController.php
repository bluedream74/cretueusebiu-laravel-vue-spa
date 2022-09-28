<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\RefundService;
use App\User;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class RefundController extends BaseController
{
    /**
     * @var RefundService
     */
    protected $service;

    /**
     * RefundController constructor
     * 
     */
    public function __construct(
        RefundService $service
    )
    {
        $this->service = $service;
    }

    public function getAllRefunds() {
        $refunds = $this->service->getAllRefunds();
        return response()->json([
            'refunds' => $refunds
        ]);
    }

    public function createRefund(Request $request) {
        $flag = $this->service->createRefund($request->all());

        return response()->json([
            'flag' => $flag
        ]);
    }
}
