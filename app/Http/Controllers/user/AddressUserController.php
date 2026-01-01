<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\AddressRequest;
use App\Http\Requests\user\updateAddressRequest;
use App\Services\User\AddressService;

class AddressUserController extends Controller
{
    public function __construct(private AddressService $address_service) {}

    public function index() {
        $address = $this->address_service->getUserAddress();
        return response()->json([
            "address" => $address
        ]);
    }

    public function create(AddressRequest $request) {
        $data = $request->validated();

        $this->address_service->create($data);

        return $this->resJson(["message" => "success create address"]);
    }

    public function update(updateAddressRequest $request, $id) {
        $data = $request->validated();

        $this->address_service->update($data, $id);

        return $this->resJson(["message" => "success update"]);
    }

    public function delete($id) {
        $this->address_service->delete($id);

        return $this->resJson(["message" => "success delete addreess"]);
    }
}
