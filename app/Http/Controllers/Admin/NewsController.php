<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\NewsService;
use App\User;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class NewsController extends BaseController
{
    /**
     * @var NewsService
     */
    protected $service;

    /**
     * NewsController constructor
     * 
     */
    public function __construct(
        NewsService $service
    )
    {
        $this->service = $service;
    }

    public function getAllNews() {
        $news = $this->service->getAllNews();

        return response()->json([
            'news' => $news
        ]);
    }

    public function createNews(Request $request) {
        $flag = $this->service->createNews($request->all());

        return response()->json([
            'flag' => $flag
        ]);
    }

    public function deleteNews(Request $request) {
        $flag = $this->service->deleteNews($request->all());

        return response()->json([
            'flag' => $flag
        ]);
    }
}
