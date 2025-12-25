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
}