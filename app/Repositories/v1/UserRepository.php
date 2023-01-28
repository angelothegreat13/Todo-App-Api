<?php 

namespace App\Repositories\v1;

use App\Models\User;

class UserRepository
{	
	public function findByEmail(string $email)
	{
		return User::where('email', $email)->first();
	}

	public function create(array $userData)
	{	 
		$user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password'])
        ]);

        return $user;
	}

}