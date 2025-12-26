<?php 

namespace App\Services\Brand;

use App\Models\Brand;
use App\Services\CrudService;

class BrandService extends CrudService {
    public function __construct(Brand $model) {
        parent::__construct($model);
    }

    public function getAll() {
        return $this->findAll(["id", "name"]);
    }

    public function create(array $data)
    {
        return parent::create($data);
    }
}