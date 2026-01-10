<?php

namespace Tests\Feature\auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_can_register(): void
    {
        $response = $this->post('/api/register', [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'role_name' => "admin",
            'password_hash' => Hash::make('password'),
        ]);

        $response->assertStatus(200);
    }

    public function test_user_register_failed_due_validation_errors()
    {
        $response = $this->postJson('api/register', [
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'password_hash' => Hash::make('password'),
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'email',
                'role_name',
            ]);
    }
}
