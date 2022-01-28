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

Route::get('/', function () {
    return view('welcome');
});

// 메인 페이지에서 '게시판' 클릭 시 이동하는 라우터
Route::get('/boardCreate', [BoardController::class,'create'])
-> name('boardCreate');



// get 방식으로 AdminJoinCotroller의 create를 가져와서 사용하겠다