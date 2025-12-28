<?php

namespace App\Http\Controllers\category;

use App\Http\Requests\NameRequest;

class updateCategoryController extends CategoryController
{
    public function update(NameRequest $request, $id) {
        $data = $request->validated();

        $this->category->up($data, $id);

        return response()->json([
            "message" => "category updated!"
        ]);
    }
}
