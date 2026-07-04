<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $result = $this->authService->register($data);

        return response()->json([
            'message' => 'Usuario criado com sucesso!',
            'data' => $result
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $result = $this->authService->login($data);

        if (!$result) {
            return response()->json([
                'message' => 'Credenciais invalidas!'
            ], 401);
        }

        return response()->json([
            'message' => 'Login realizado com sucesso!',
            'data' => $result
        ]);
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request->user());

        return response()->json([
            'message' => 'Logou realizado com sucesso!'
        ]);
    }
}
