<?php

namespace App\Domains\Menu\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class MenuRouteServiceProvider extends ServiceProvider
{
    public function boot() {
        Route::group(['middleware' => ['web'], 'prefix' => 'auth'], function () {
            Route::get('/menu', 'App\Domains\Menu\Controllers\MenuController@viewMenu');
            Route::post('/menu', 'App\Domains\Menu\Controllers\MenuController@getMenuList');

            Route::get('/new-menu', 'App\Domains\Menu\Controllers\MenuController@viewNewMenu');
            Route::post('/new-menu', 'App\Domains\Menu\Controllers\MenuController@updateNewMenu');
        });
    }
}