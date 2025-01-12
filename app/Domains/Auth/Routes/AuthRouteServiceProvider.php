<?php

namespace App\Domains\Auth\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class AuthRouteServiceProvider extends ServiceProvider
{
    public function boot() {
       Route::prefix('auth')->group(function (){
           Route::post('/join', 'App\Domains\Auth\Controllers\AuthController@store');
       });
    }
}