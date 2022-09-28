<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\BuyerService;
use App\User;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class BuyerController extends BaseController
{
    /**
     * @var BuyerService
     */
    protected $service;

    /**
     * BuyerController constructor
     * 
     */
    public function __construct(
        BuyerService $service
    )
    {
        $this->service = $service;
    }

    public function getUsers() {

        $users = $this->service->getUsers();

        return response()->json([
            'users' => $users
        ]);
    }

    public function getUserDetailInfo($id) {
        $userDetail = $this->service->getUserDetailInfo($id);

        return response()->json([
            'user_info' => $userDetail
        ]);
    }

    public function getCreators() {
        $creators = $this->service->getCreatorsForAdmin();

        return response()->json([
            'creators' => $creators
        ]);
    }

    public function getCreatorDetailInfo($id) {
        $userDetail = $this->service->getCreatorDetailInfo($id);

        return response()->json([
            'user_info' => $userDetail
        ]);
    }

    public function updateUserFee(Request $request) {
        $updatedUser = $this->service->updateUserFee($request->all());

        return response()->json([
            'updated_buyer' => $updatedUser
        ]);
    }

    public function blockCreator(Request $request){
        $this->service->blockCreator($request->all());

        return response()->json([
            'flag' => true
        ]);
    }
}
