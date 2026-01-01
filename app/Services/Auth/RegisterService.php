<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\EmailHasTakenException;
use App\Exceptions\Auth\UserNotFoundException;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;
use Spatie\Permission\Models\Role;

class RegisterService
{
    public function register(array $data)
    {
        $allowedRoles = ['admin', 'staff', 'customer']; 

        if (!in_array($data["role_name"], $allowedRoles, true)) {
            throw new InvalidArgumentException('Invalid role');
        }

        return DB::transaction(function () use ($data) {

            if (User::where('email', $data['email'])->exists()) {
                throw new EmailHasTakenException();
            }

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password_hash' => Hash::make($data['password_hash']),
                'phone' => $data['phone'],
            ]);

            $role = Role::firstOrCreate([
                'name' => $data["role_name"],
                'guard_name' => 'web',
            ]);

            $user->assignRole($role);

            return $user;
        });
    }
}
