<?php

namespace App\Http\Controllers\category;

class deleteCategoryController extends CategoryController
{
    public function delete($id) {
        $this->category->del($id);

        return response()->json([
            "message" => "category deleted"
        ]);
    }
}
