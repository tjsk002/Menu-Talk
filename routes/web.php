<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('docs/{file?}', 'DocsController@show');
//    $text = (new App\Documentation)->get($file);
//    return app(ParsedownExtra::class)->text($text);

Route::get('/', 'Home\Home2Controller@home')
//    return view('layouts.header')
    ->name('home2');

// 게시판 보기
Route::get('/index', 'ArticlesController@index')
    ->name('index');

Route::middleware('')->prefix('/')->group(function (){
    Route::get('/invoice', 'App\Domains\Manages\Controllers\InvoiceController@invoice')->name('manage.invoice');
});

//Route::prefix('/manage/auth')->group(function (){
////    Route::get('/login', ['App\Http\Controllers\SessionsController@create'])->name('manage.auth.login');
////    Route::post('auth/login', [
////        'as' => 'sessions.store',
////        'uses' => 'SessionsController@store',
////    ]);
//
//    Route::get('/login', [
//        'as' => 'manage.auth.login',
//        'uses' => 'SessionsController@create',
//    ]);
//    Route::post('/login', [
//        'as' => 'sessions.store',
//        'uses' => 'SessionsController@store',
//    ]);
//});

Route::get('auth/remind', [
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind',
]);

Route::post('auth/remind', [
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind',
]);

//Route::get('auth/reset/{token}', [
//    'as' => 'reset.create',
//    'uses' => 'PasswordsController@getReset',
//])->where('token', '[\pL-\pN]{64}');
// where('token', '[\pL-\pN]{64}'); 비밀번호 바꾸기 폼 -> 라우트 보호하기

Route::post('auth/reset', [
    'as' => 'reset.store',
    'uses' => 'PasswordsController@getReset',
]);