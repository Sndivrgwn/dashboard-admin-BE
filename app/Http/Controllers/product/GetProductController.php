<?php

namespace App\Http\Controllers\product;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

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

    public function getById($id) {
        $product =  $this->product_service->getById($id)->with(["brand" => function($query){$query->select("id","name");}, "category" => function($query){$query->select("id", "name");}])->first();

        if(!$product) {
            throw new NotFoundException("Product Not Found");
        }

        return response()->json([
            "message" => "product found!",
            "product" => $product
        ]);
    }
}
