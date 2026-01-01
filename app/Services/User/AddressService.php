<?php 

namespace App\Services\User;

use App\Models\Address;
use App\Services\CrudService;

class AddressService extends CrudService {
    public function __construct(Address $model)
    {
        return parent::__construct($model);
    }

    public function getUserAddress() {
        $user = auth()->user();

        return parent::findAll()->where("user_id", $user->id);
    }

    public function create(array $data)
    {
        $data["user_id"] = auth()->user()->id;

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