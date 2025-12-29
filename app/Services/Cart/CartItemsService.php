<?php 

namespace App\Services\Cart;

use App\Models\CartItem;
use App\Models\Variant;
use App\Services\CrudService;

class CartItemsService extends CrudService{
    public function __construct(CartItem $model)
    {
        return parent::__construct($model);
    }

    public function createCartItems(array $data) {
        $data["unit_price_snapshot"] = Variant::where("id", $data["variant_id"])->value('price');

        return parent::create($data);
    } 

    public function up(array $data, $id) {
        $cartItems = $this->model->find($id);

        $cartItems->update($data);
    }

    public function del($id) {
        return parent::delete($id);
    }
}