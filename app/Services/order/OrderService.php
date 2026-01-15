<?php

namespace App\Services\order;

use App\Models\Order;
use App\Services\CrudService;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class OrderService extends CrudService
{

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function createOrderNumber()
    {
        // Format: ORD-20260115070030-ABCDE (Total 25 Karakter)
        return 'ORD-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(5));
    }

    public function create(array $data)
    {
        $id = $this->createOrderNumber($data["id"]);

        return $id;
    }
}
