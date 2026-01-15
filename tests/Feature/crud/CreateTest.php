<?php

namespace Tests\Feature\crud;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function atest_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
