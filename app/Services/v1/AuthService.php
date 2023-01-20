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
		if (!auth()->attempt(['email' => $email, 'password' => $password])) {
			return false;
        }

        return currentUser()->createToken('auth-token')->plainTextToken;
	}

	public function register(array $userData)
	{
		$this->userRepository->create($userData);
	}
}