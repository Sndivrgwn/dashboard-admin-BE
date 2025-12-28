<?php

namespace App\Http\Controllers\brand;

class deletebrandController extends BrandController
{
    public function delete($id) {
        $this->brand->del($id);

        return response()->json([
            "message" => "brand deleted!"
        ]);
    }
}
