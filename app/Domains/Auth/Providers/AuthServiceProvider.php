<?php

namespace App\Domains\Auth\Providers;

use App\Domains\Auth\Services\AuthService;
use App\Domains\Auth\Services\AuthServiceInterface;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

    public function boot(): void
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }
}