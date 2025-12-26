<?php 

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CrudService {
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    protected function findAll($columns = ["*"]): Collection {
        return $this->model->all($columns);
    }

    protected function findAllWith(array $relations, $columns = ["*"]) {
        return $this->model->with($relations)->get($columns);
    }

    public function findBy(string $column, $value) 
    {
        return $this->model->where($column, $value);
    }

    protected function create(array $data) {
        return $this->model->create($data);
    }
}