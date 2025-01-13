<?php

namespace App\Domains\Auth\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class AuthRouteServiceProvider extends ServiceProvider
{
    public function boot() {
       Route::prefix('auth')->group(function (){
           Route::get('/join', 'App\Domains\Auth\Controllers\AuthController@viewJoin');
           Route::post('/join', 'App\Domains\Auth\Controllers\AuthController@join');
           Route::get('/login', 'App\Domains\Auth\Controllers\AuthController@viewLogin');
           Route::post('/login', 'App\Domains\Auth\Controllers\AuthController@login');
       });
    }
}