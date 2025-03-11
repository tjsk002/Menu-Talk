<?php

namespace App\Domains\Menu\Providers;

use App\Domains\Contacts\Services\ContactService;
use App\Domains\Contacts\Services\ContactServiceInterface;
use App\Domains\Menu\Services\MenuService;
use App\Domains\Menu\Services\MenuServiceInterface;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(MenuServiceInterface::class, MenuService::class);
    }
}