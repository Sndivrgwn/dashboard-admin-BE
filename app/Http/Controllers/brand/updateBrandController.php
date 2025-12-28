<?php

namespace App\Http\Controllers\brand;

use App\Http\Requests\NameRequest;

class updateBrandController extends BrandController
{
    public function update(NameRequest $request, $id) {
        $data = $request->validated();

        $this->brand->up($data, $id);

        return response()->json([
            "message" => "brand updated!"
        ]);
    }
}
