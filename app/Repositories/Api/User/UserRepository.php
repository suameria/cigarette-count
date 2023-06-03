<?php

namespace App\Repositories\Api\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getByEmail(string $email): User|null
    {
        return $this->user->query()
            ->select([
                'id',
                'name',
                'email',
                'password',
            ])
            ->where('email', $email)
            ->first();
    }

    public function store(array $request): User
    {
        $data = [
            'name'     => $request['name'],
            'email'    => $request['email'],
            'password' => Hash::make($request['password']),
        ];

        return $this->user->query()->create($data);
    }
}
