<?php 

namespace App\Repositories\v1;

use App\Models\User;

class UserRepository
{	
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