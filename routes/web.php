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

// 메인페이지 -> home
//Route::get('/', function () {
//    return view('home');
//});

//Route::get('/', 'Home\HomeController@home')
////    return view('layouts.header')
//    -> name('home');

Route::get('/', 'Home\Home2Controller@home')
//    return view('layouts.header')
    -> name('home2');

// 메인 페이지에서 '게시판' 클릭 시 이동하는 라우터
Route::get('/board', 'Board\BoardController@board')
    -> name('board');

// board page -> '글쓰기' 버튼 클릭 시
Route::get('/boardWrite', 'Board\BoardController@write')
    ->name('boardWrite');

// 게시판 보기
Route::get('/article', 'Articles\ArticlesController@index')
    -> name('article');

// 게시판 작성하기
//Route::get('/articleCreate', 'Articles\ArticlesController@create')
//    -> name('articleCreate');

// 메인 페이지에서 '회원가입' 클릭 시 이동하는 라우터
Route::get('/join','Admin\JoinController@index')
    ->name('join');

Route::resource('articles','Articles\ArticlesController');


//Route::get('blade', function(){
//    return view('child');
//});
