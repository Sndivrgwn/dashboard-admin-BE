<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CreateProductRequest;
use App\Services\Product\ProductService;

class CreateProductController extends Controller
{
    public function __construct(private ProductService $product_service)
    {
    }

    public function create(CreateProductRequest $request) {
        $data = $request->validated();

        [$product, $imgPath] = $this->product_service->create($data);

        return response()->json([
            "message" => "product created!",
            "product" => $product,
            "image_path" => $imgPath
        ]);
    }
}
