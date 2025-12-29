<?php

namespace App\Http\Controllers\cart;

use App\Http\Controllers\Controller;
use App\Services\Cart\CartService;

class CartController extends Controller
{
    public function __construct(private CartService $cartService) {}

    public function index() {
        return response()->json([
            "message" => $this->cartService->getUserCart()->get()
        ]);
    }
}
