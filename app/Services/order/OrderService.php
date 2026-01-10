<?php 

namespace App\Services\order;

use App\Models\Order;
use App\Services\CrudService;
use Illuminate\Support\Facades\Date;

class OrderService extends CrudService {
    
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function createOrderId($id) {
        $time = Date::now()->timestamp;

        $order_id = `$id$time`;

        return $order_id;
    }

    public function create(array $data)
    {
        $this->createOrderId($data["id"]);
    }
}