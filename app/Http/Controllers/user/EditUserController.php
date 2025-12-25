<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditAvatarRequest;
use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\EditUserRequest;
use App\Services\Auth\EditUserService;

class EditUserController extends Controller
{
    public function __construct(private EditUserService $edit_user_service)
    {
    }

    public function update(EditUserRequest $request)
    {
        $data = $request->validated();

        $this->edit_user_service->Update($data);

        return response()->json([
            "message" => "User has successfuly updated!",
        ]);
    }

    public function updatePassword(EditPasswordRequest $request)
    {
        $data = $request->validated();

        $this->edit_user_service->updatePassword($data);

        return response()->json([
            "message" => "Password updated successfully"
        ]);
    }

    public function updateAvatar(EditAvatarRequest $request)
    {
        $data = $request->validated();

        $avatarPath = $this->edit_user_service->updateAvatar($data);

        return response()->json([
            "message" => "Avatar updated successfully",
            "avatar" => $avatarPath
        ]);
    }
}
