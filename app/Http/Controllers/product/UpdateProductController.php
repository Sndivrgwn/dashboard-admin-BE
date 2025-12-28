<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\updateProductRequest;
use App\Services\Product\ProductService;

class UpdateProductController extends Controller
{
    public function __construct(private ProductService $product_service) {}
    
    public function update(updateProductRequest $request, $id) {
        $data = $request->validated();
        $this->product_service->up($data, $id);
        
        return response()->json([
            "message" => "product updated"
        ]);
    }
}
