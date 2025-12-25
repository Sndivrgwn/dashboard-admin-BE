<?php 

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class CrudService {
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
    protected function findAll($columns = ["*"]) {
        return $this->model->all($columns);
    }

    protected function findAllWith(array $relations, $columns = ["*"]) {
        return $this->model->with($relations)->get($columns);
    }

    protected function create(array $data) {
        return $this->model->create($data);
    }
}