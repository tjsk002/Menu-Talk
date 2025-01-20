<?php

namespace App\Domains\Auth\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileService implements ProfileServiceInterface
{
    public function __construct(User $user)
    {
    }

    public function updateProfile()
    {
        // TODO: Implement updateProfile() method.
    }
}