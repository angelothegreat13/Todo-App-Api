<?php

namespace Tests\Unit\v1;

use Tests\TestCase;
use App\Models\User;
use Mockery\MockInterface;
use App\Services\v1\AuthService;
use App\Repositories\v1\UserRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_generate_token()
    {
        $user = User::factory()->create();
        $userRepository = new UserRepository;
        $authService = new AuthService($userRepository);
        $token = $authService->login($user->email, 'password');

        $this->assertIsString($token);
    }

    /** @test */
    public function it_can_create_the_user()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ];
        
        $userRepository = new UserRepository;
        $authService = new AuthService($userRepository);
        $user = $authService->register($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($data['name'], $user->name);
        $this->assertEquals($data['email'], $user->email);
    }    
}
