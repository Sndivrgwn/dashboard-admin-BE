<?php

namespace App\Http\Controllers\brand;

use App\Http\Requests\NameRequest;

class CreateBrandController extends BrandController
{
    public function create(NameRequest $request) {
        $data = $request->validated();

        $this->brand->create($data);

        return response()->json([
            "message" => "Create brand successfully!"
        ]);
    }
    
}
