<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Services\Category\CategoryService;

class GetCategoryController extends Controller
{
    public function __construct(private CategoryService $category) {}

    public function index() {
        $category = $this->category->getAll();

        return response()->json([
            "category" => $category
        ]);
    }
}
