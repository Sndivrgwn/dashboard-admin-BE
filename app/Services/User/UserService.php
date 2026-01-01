<?php 

namespace App\Services\user;

use App\Models\User;
use App\Services\CrudService;

class UserService extends CrudService {
    public function __construct(User $model)
    {
        return parent::__construct($model);
    }

    public function getAll() {
        return $this->model->with([
            "cart" => function($query){$query->select("user_id", "status");},
            "roles",
        ])->get();
    }

    public function getById($id) {
        return $this->model->with([
            "cart" => function($query){$query->select("user_id", "status");},
            "roles",
        ])->find($id);
    }
}
