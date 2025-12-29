<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\cart\CartItemsRequest;
use App\Services\Cart\CartItemsService;
use Illuminate\Http\Request;

class CartItemsController extends Controller
{
    public function __construct(private CartItemsService $cart_items_service) {}

    public function createCartItems(CartItemsRequest $request) {
        $data = $request->validated();   

        $this->cart_items_service->createCartItems($data);

        return response()->json([
            "message" => "cart items successfully created!"
        ]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            "qty" => "required|numeric"
        ]);

        $this->cart_items_service->up($data, $id);

        return response()->json([
            "message" => "cart items successfully updated!"
        ]);
    }

    public function delete($id) {
        $this->cart_items_service->del($id);

        return response()->json([
            "message" => "cart items successfully deleted!"
        ]);
    }
}
