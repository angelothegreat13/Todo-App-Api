<?php 

namespace App\Services\v1;

use App\Models\User;
use App\Repositories\v1\UserRepository;

class AuthService 
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
    	$this->userRepository = $userRepository;
    }

	public function login($email, $password)
	{
		if (auth()->attempt(['email' => $email, 'password' => $password])) {
	        $user = $this->userRepository->findByEmail($email);
	        return $user->createToken('authToken')->plainTextToken;
        }
	}

	public function register(array $userData)
	{
		return $this->userRepository->create($userData);
	}
}