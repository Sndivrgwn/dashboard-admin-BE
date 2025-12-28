<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\CrudService;

class CategoryService extends CrudService {
    public function __construct(Category $model)
    {
        return parent::__construct($model);
    }

    public function getAll() {
        return $this->findAll(["id", "name"]);
    }

    public function getById($id) {
        return $this->findBy("id", $id)->first();
    }

    public function create(array $data)
    {
        return parent::create($data);
    }

    public function up(array $data, $id) {
        $cat = parent::findBy("id", $id)->first();

        return $cat->update($data);
    }

    public function del($id) {
        return parent::delete($id);
    }
}