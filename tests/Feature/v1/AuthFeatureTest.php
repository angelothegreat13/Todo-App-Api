<?php

namespace Tests\Feature\v1;

use Tests\TestCase;
use App\Models\User;
use App\Services\v1\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_register()
    {
        $response = $this->postJson(route('auth.register'),[
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password' 
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'message'
            ]);

        $this->assertDatabaseHas('users',[
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com'
        ]);
    }

    /** @test */
    public function a_user_can_login()
    {
        $user = User::factory()->create();

        $response = $this->postJson(route('auth.login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'token'
                ]
            ]);
    }
}
