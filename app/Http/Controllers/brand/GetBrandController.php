<?php

namespace App\Http\Controllers\brand;

class GetBrandController extends BrandController
{
    public function index()
    {
        $brand = $this->brand->getAll();

        return response()->json([
            "brand" => $brand
        ]);
    }

    public function getById($id) {
        return response()->json([
            "message" => "brand found!",
            "brand" => $this->brand->getById($id)
        ]);
    }
}
