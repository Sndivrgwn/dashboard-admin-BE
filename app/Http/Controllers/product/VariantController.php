<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CreateVariantRequest;
use App\Http\Requests\product\UpdateVariantRequest;
use App\Services\Product\VariantService;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function __construct(private VariantService $variantService) {}

    public function create(CreateVariantRequest $request) {
        $data = $request->validated();

        $this->variantService->create($data);

        return response()->json([
            "message" => "variant successfully created!"
        ]);
    }

    public function update(UpdateVariantRequest $request, $id) {
        $data = $request->validated();

        $this->variantService->up($data, $id);

        return response()->json([
            "message" => "variant successfully updated!"
        ]);
    }

    public function delete($id) {
        $this->variantService->del($id);

        return response()->json([
            "message" => "variant successfully deleted!"
        ]);
    }
}
