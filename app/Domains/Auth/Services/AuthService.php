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
}