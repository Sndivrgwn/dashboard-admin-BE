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
}
