<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class GetProductController extends Controller
{
    public function __construct(private ProductService $product_service)
    {
    }

    public function index() {
        return response()->json([
            "product" => $this->product_service->getAll()
        ]);
    }
}
