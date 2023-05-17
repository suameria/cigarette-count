<?php

namespace App\Services\Api\User;

use App\Repositories\Api\User\UserRepositoryInterface;

class UserService implements UserServiceInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $request)
    {
        $user = $this->userRepository->store($request);

        $accessToken = explode('|', $user->createToken($user->email)->plainTextToken)[1];

        return [
            'id' => $user->id,
            'accessToken' => $accessToken,
        ];
    }
}
