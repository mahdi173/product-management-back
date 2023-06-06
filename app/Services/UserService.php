<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UserService
{        
    /**
     * __construct
     *
     * @param  UserRepository $userRepository
     * @return void
     */
    public function __construct( private UserRepository $userRepository)
    {
    }

    /**
     * createUserToken
     *
     * @param  mixed $email
     * @param  mixed $password
     * @return JsonResponse|array
     */
    public function createUserToken(string $email, string $password): JsonResponse|array
    {
        $user = $this->userRepository->getUserByEmail($email);

        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json([
                'msg' => 'Incorrect email or password'
            ], 422);
        }

        $token = $user->createToken('apiToken')->plainTextToken;

        return ['user' => $user, 'token' => $token];
    }
}