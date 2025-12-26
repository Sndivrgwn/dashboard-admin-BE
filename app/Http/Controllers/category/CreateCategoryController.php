<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Http\Requests\NameRequest;
use Illuminate\Http\Request;

class CreateCategoryController extends CategoryController
{
    public function create(NameRequest $request) {
        $data = $request->validated();

        $this->category->create($data);

        return response()->json([
            "message" => "Create category successfully!"
        ]);
    }
}
