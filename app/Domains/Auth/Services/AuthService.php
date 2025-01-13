<?php

namespace App\Domains\Auth\Services;

use App\Models\User;

class AuthService implements AuthServiceInterface
{
    public function __construct(private User $user)
    {
    }

    public function create(array $args)
    {
        return $this->user->create($args);
    }

    public function login(array $args)
    {
        // TODO: Implement login() method.
    }

    public function findUser(string $email)
    {
       return $this->user->where(['email' => $email])->first();
    }
}