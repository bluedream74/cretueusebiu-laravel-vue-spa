<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\User;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class PaymentController extends BaseController
{
    /**
     * @var PaymentService
     */
    protected $service;

    /**
     * PaymentController constructor
     * 
     */
    public function __construct(
        PaymentService $service
    )
    {
        $this->service = $service;
    }

    public function getAllPayments() {
        list($payments, $creators, $months) = $this->service->getAllPayments();
        return response()->json([
            'payments' => $payments,
            'creators' => $creators,
            'months' => $months
        ]);
    }

    public function nyukinAction(Request $request) {
        $flag = $this->service->nyukinAction($request->all());

        return response()->json([
            'flag' => $flag
        ]);
    }

    public function searchPayments(Request $request) {
        $payments = $this->service->searchPayments($request->all());

        return response()->json([
            'payments' => $payments
        ]);
    }
}
