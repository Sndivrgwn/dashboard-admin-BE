<?php 

namespace App\Services\Product;

use App\Exceptions\NotFoundException;
use App\Models\Inventories;
use App\Services\CrudService;

class Inventoryservice extends CrudService {
    public function __construct(Inventories $model)
    {
        return parent::__construct($model);
    }

    public function getById($id) {
        $inv =  $this->model->find($id);

        if(!$inv) {
            throw new NotFoundException("Inventories not found", 404);
        }

        return $inv;
    }

    public function create(array $data)
    {
        return parent::create($data);
    }

    public function update(array $data, $id)
    {
        return parent::update($data, $id);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}