<?php 

namespace App\Services\v1;

use App\Repositories\v1\TodoRepository;

class TodoService 
{
	protected $todoRepository;

	public function __construct(TodoRepository $todoRepository)
	{
		$this->todoRepository = $todoRepository;
	}

	public function getTodos()
	{
		return $this->todoRepository->getTodos();
	}

	public function createTodo()
	{
		
	}

	public function updateTodo()
	{

	}

	public function deleteTodo()
	{

	}

}