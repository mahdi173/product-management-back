<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * __construct
     *
     * @param  UserService $userService
     * @return void
     */
    public function __construct(private UserService  $userService)
    {
    }
    
    /**
     * login
     *
     * @param  LoginRequest $request
     * @return JsonResponse|array
     */
    public function login(LoginRequest $request): JsonResponse|array
    {
        return $this->userService->createUserToken($request->email, $request->password);
    }
    
    /**
     * logout
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        Auth::guard('web')->logout();
        return response()->json(['message' => 'user logged out']);
    }
}
