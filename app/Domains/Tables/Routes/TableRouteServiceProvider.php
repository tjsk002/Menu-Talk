<?php

namespace App\Domains\Tables\Routes;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
class TableRouteServiceProvider extends ServiceProvider
{
    public function boot() {
        Route::group(['middleware' => ['web'], 'prefix' => 'auth'], function () {
            Route::group(['middleware' => ['auth']], function () {
                Route::get('/table', 'App\Domains\Tables\Controllers\TableController@viewTable');
                Route::post('/table', 'App\Domains\Tables\Controllers\TableController@updateTable');
            });
        });
    }
}