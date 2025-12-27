<?php

namespace App\Services\Product;

use App\Models\Category;
use App\Models\Product;
use App\Services\CrudService;

class ProductService extends CrudService
{
    public function __construct(Product $model)
    {
        return parent::__construct($model);
    }

    public function getAll()
    {
        return parent::findAllWith(['brand' => function($query) {
            $query->select('id', 'name');
        }, 'category' => function($query) {
            $query->select('id', 'name');
        }]);
    }

    public function getById($id) {
        return parent::findBy("id", $id);
    }

    public function create(array $data)
    {
        $productImgPath = $data["image"]->store("product", "public");
        $data["image"] = $productImgPath;

        return parent::create($data);
    }
}
