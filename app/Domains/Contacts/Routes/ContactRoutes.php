<?php

use Illuminate\Support\Facades\Route;

Route::middleware('')->group(function (){
    Route::post('/', 'App\Domains\Contacts\Controllers@store');
});