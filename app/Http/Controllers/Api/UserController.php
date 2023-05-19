<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\LoginRequest;
use App\Http\Requests\Api\User\StoreUserRequest;
use App\Services\Api\User\UserServiceInterface;
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
     * @param  mixed $request
     * @return void
     */
    public function store(StoreUserRequest $request)
    {
        $data = $this->userService->createUser($request->toArray());
        return response()->success(Response::HTTP_CREATED, $data);
    }

    /**
     * ログイン(アクセストークンを返却)
     *
     * @param  mixed $request
     * @return void
     */
    public function login(LoginRequest $request)
    {
        $data = ['accessToken' => $request->accessToken];
        return response()->success(Response::HTTP_OK, $data);
    }
}
