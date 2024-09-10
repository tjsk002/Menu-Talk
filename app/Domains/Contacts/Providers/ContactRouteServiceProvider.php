<?php
namespace App\Domains\Contacts\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class ContactRouteServiceProvider extends RouteServiceProvider
{
    public function __boot(): void
    {
        Route::prefix('contact-form')
            ->namespace($this->namespace)
            ->group(base_path('app/Domains/Contacts/Routes/ContactRoutes.php'));
    }
}