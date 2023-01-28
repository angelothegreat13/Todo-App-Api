<?php 

namespace App\Repositories\v1;

use App\Models\Todo;

class TodoRepository
{		
	public function getTodos()
	{
        return Todo::where('user_id', currentUser()->id)->get();
	}

	public function create(array $data)
	{
		
	}

	public function update(array $data)
	{

	}

	public function deleteById()
	{

	}
}