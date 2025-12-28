<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;

class DeleteProductController extends Controller
{
    public function __construct(private ProductService $product_service) {}
    
    public function delete($id) {
        $this->product_service->del($id);

        return response()->json([
            "message" => "Product deleted"
        ]);
    }
}
