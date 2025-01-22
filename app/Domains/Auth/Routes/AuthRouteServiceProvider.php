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

       });

        Route::group(['middleware' => ['web'], 'prefix' => 'auth'], function () {
            Route::get('/login', 'App\Domains\Auth\Controllers\AuthController@viewLogin')->name('login');
            Route::post('/login', 'App\Domains\Auth\Controllers\AuthController@login');
            Route::get('/logout', 'App\Domains\Auth\Controllers\AuthController@logout')->name('logout');

            Route::group(['middleware' => ['auth']], function () {
                Route::get('/profile', 'App\Domains\Auth\Controllers\ProfileController@viewProfile');
                Route::post('/profile', 'App\Domains\Auth\Controllers\ProfileController@updateProfile');
            });
        });
    }
}