<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    public function index()
    {   
        $todos = Todo:all();

        return 'Todo Index';
    }

    public function store()
    {
        
    }


}