<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Services\Product\Inventoryservice;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct(private Inventoryservice $inventoryservice) {}

    public function getById($id) {
        return $this->resJson(["inventory" => $this->inventoryservice->getById($id)]);
    }

    public function create(Request $request) {
        $data = $request->validate([
            "variant_id" => "required|exists:variants,id",
            "stock_on_hand" => "required|numeric",
            "stock_reserved" => "required|numeric",
            "low_stock_threshold" => "required|numeric",
        ]);

        $this->inventoryservice->create($data);

        return $this->resJson(["message" => "success create inventory"]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            "variant_id" => "required|exists:variants,id",
            "stock_on_hand" => "required|numeric",
            "stock_reserved" => "required|numeric",
            "low_stock_threshold" => "required|numeric",
        ]);

        $this->inventoryservice->update($data, $id);

        return $this->resJson(["message"=>"success update inventory"]);
    }

    public function delete($id) {
        $this->inventoryservice->delete($id);

        return $this->resJson(["message"=>"success delete inventory"]);
    }
}
