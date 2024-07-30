<?php

namespace App\Domains\Contacts\Providers;

use App\Domains\Contacts\Services\ContactService;
use App\Domains\Contacts\Services\ContactServiceInterface;
use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->bind(ContactServiceInterface::class, ContactService::class);
    }
}