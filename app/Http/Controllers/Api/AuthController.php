<?php

namespace App\Http\Controllers\Api;

use App\Actions\Auth\login;
use App\Actions\Auth\logout;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function login(LoginRequest $request, login $loginAction)
    {
        try {
            $data = $request->validated();
            $token = $loginAction->execute($data['email'], $data['password']);

            if (! $token) {
                return $this->errorResponse('Invalid credentials', 401);
            }

            return $this->successResponse([
                'token' => $token,
                'user' => auth()->user(),
            ], 'Login successful!',200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            (new logout)->execute($request);

            return $this->successResponse(null, 'Logged out successfully');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    public function login_execption(Request $request)
    {
        return $this->errorResponse('You have to login', 401);
    }
}
