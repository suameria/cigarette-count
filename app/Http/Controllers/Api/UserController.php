<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\LoginUserRequest;
use App\Http\Requests\Api\User\StoreUserRequest;
use App\Services\Api\User\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * ユーザー登録(アクセストークンを返却)
     *
     * @param  StoreUserRequest $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        $data = $this->userService->createUser($request->toArray());
        return response()->success(Response::HTTP_CREATED, $data);
    }

    /**
     * ログイン(アクセストークンを返却)
     *
     * @param  LoginUserRequest $request
     * @return JsonResponse
     */
    public function login(LoginUserRequest $request): JsonResponse
    {
        $data = ['accessToken' => $request->accessToken];
        return response()->success(Response::HTTP_OK, $data);
    }
}
