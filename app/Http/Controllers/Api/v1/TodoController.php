<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Services\v1\TodoService;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\TodoResource;
use App\Http\Resources\v1\TodoCollection;

use App\Models\User;
use App\Http\Resources\v1\UserResource;

class TodoController extends Controller
{
    protected $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function index()
    {   
        $todos = $this->todoService->getTodos();

        return TodoResource::collection($todos);
    }

    public function store()
    {
        
    }


}