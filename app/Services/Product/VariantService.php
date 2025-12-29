<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Models\Variant;
use App\Services\CrudService;
use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Model;

class VariantService extends CrudService
{
    public function __construct(Variant $model)
    {
        return parent::__construct($model);
    }

    public function create(array $data)
    {
        $product = Product::find($data["product_id"]);
        $productName = strtoupper($product->name);
        $productSkuPrefix = substr($productName, 0, 3); 
        $val1 = strtoupper($data["option1_value"]);
        $val2 = strtoupper($data["option2_value"]);

        $lastEntry = $this->model->where('sku', 'like', $productSkuPrefix . '%')
            ->orderBy('id', 'desc')
            ->first();

        if (!$lastEntry) {
            $nextNumber = 1;
        } else {
            $lastNumber = substr($lastEntry->sku, -3);
            $nextNumber = intval($lastNumber) + 1;
        }

        $formattedNumber = sprintf('%03d', $nextNumber);

        $data['sku'] = $productSkuPrefix . '-'. $val1. '-'. $val2 . '-'. $formattedNumber;

        return $this->model->create($data);
    }

    public function up(array $data, $id)
    {
        $variant = $this->model->find($id);

        $skuParts = explode("-", $variant->sku);

        if (isset($data["option1_value"])) {
            $skuParts[1] = strtoupper($data["option1_value"]);
        }

        if (isset($data["option2_value"])) {
            $skuParts[2] = strtoupper($data["option2_value"]);
        }

        $data["sku"] = implode("-", $skuParts);

        return $variant->update($data);
    }

    public function del($id)
    {
        return parent::delete($id);
    }
}
