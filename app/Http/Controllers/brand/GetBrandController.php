<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use App\Services\Brand\BrandService;

class GetBrandController extends Controller
{
    public function __construct(private BrandService $brand)
    {
    }

    public function index() {
        $brand = $this->brand->getAll();

        return response()->json([
            "brand" => $brand
        ]);
    }
}
