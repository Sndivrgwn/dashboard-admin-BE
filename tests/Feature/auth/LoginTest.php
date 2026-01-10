<?php

namespace Tests\Feature\auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A test user can login with valid credentials
     */
    public function test_If_User_Can_Login_With_Valid_Credentials(): void
    {
        $user = User::factory()->create([
            "password_hash" => Hash::make("password")
        ]);

        $response = $this->post('/api/login', [
            "email" => $user->email,
            "password_hash" => "password"
        ]);

        $response->assertStatus(200);
    }

    /**
     * A test user cannot login with valid credentials
     */
    public function test_user_cannot_login_with_invalid_credentials(): void {
        $user = User::factory()->create([
            "password_hash" => Hash::make("password")
        ]);

        $response = $this->post('/api/login', [
            "email" => $user->email,
            "password_hash" => "password2"
        ]);

        $response->assertStatus(401);
    }

    /**
     * A test if user not found should return error
     */
    public function test_user_not_found(): void 
    {
        $user = User::factory()->create([
            "password_hash" => Hash::make("password")
        ]);

        $response = $this->post('/api/login', [
            "email" => "tralelotralala@mail.com",
            "password_hash" => "password"
        ]);

        $response->assertStatus(404);
    }
}
