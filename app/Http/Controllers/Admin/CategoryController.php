<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\User;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class CategoryController extends BaseController
{
    /**
     * @var CategoryService
     */
    protected $service;

    /**
     * CategoryController constructor
     * 
     */
    public function __construct(
        CategoryService $service
    )
    {
        $this->service = $service;
    }

    public function getAllCategories() {
        $categories = $this->service->getAllCategories();

        return response()->json([
            'categories' => $categories
        ]);
    }

    public function removeCategory(Request $request) {
        $this->service->removeCategory($request->all());

        return response()->json([
            'flag' => true
        ]);
    }

    public function createNewCategory(Request $request) {
        $newCategory = $this->service->createNewCategory($request->all());

        return response()->json([
            'new_category' => $newCategory
        ]);
    }
}
