<?php 

namespace App\Services\Cart;

use App\Models\Cart;
use App\Services\CrudService;

class CartService extends CrudService {
    public function __construct(Cart $model)
    {
        return parent::__construct($model);
    }

    public function getUserCart() {
        $user = auth()->user();

        return $this->model->with("cart_items")->where("user_id", $user->id);
    }

    
}