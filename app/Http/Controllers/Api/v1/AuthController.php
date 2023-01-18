<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Traits\HttpResponse;
use App\Services\v1\AuthService;
use App\Http\Controllers\Controller;    
use App\Http\Requests\v1\LoginRequest;
use App\Http\Requests\v1\RegisterRequest;

class AuthController extends Controller
{
    use HttpResponse;

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        $authToken = $this->authService->login($request->email, $request->password);

        return $this->success('success',[
            'token' => $authToken
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $this->authService->register($request->validated());

        return $this->success('Registration Success', null, 201);
    }
}