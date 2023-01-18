<?php

namespace Tests\Feature\v1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthFeatureTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_register()
    {
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
            'password_confirmation' => 'password'
        ];

        $response = $this->postJson(route('auth.register'), $userData);

        $response->assertStatus(201);
    }

    /** @test */
    public function a_user_can_login()
    {

    }
}
