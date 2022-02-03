<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('header');
});

// 메인 페이지에서 '메인 배너' 클릭 시 이동하는 라우터


// 메인 페이지에서 '게시판' 클릭 시 이동하는 라우터
Route::get('/board', 'Board\BoardController@board')
    -> name('board');

// board page -> '글쓰기' 버튼 클릭 시
Route::get('/boardWrite', 'Board\BoardController@write')
    ->name('boardWrite');

// 메인 페이지에서 '메인' 클릭 시 이동하는 라우터
//Route::get('/main','Main\MainController@create')
//    ->name('main');

// 메인 페이지에서 '회원가입' 클릭 시 이동하는 라우터
Route::get('/join','Admin\AdminJoinController@join')
    ->name('join');

// 메인 페이지에서 '로그인' 클릭 시 이동하는 라우터
//Route::get('/login','Admin\AdminLoginController@login')
//    ->name('login');

Route::get('/', function(){
    return view('welcome',['name' => 'lim']);
});

Route::resource('articles','ArticlesController');

//Route::get('/', function (){
//    return view('board', ['name' => 'dd']);
//});
