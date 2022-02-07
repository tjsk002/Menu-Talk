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
Route::get('/index', 'Articles\ArticlesController@index')
    -> name('index');

// 게시판 작성하기
//Route::get('/articleCreate', 'Articles\ArticlesController@create')
//    -> name('articleCreate');

// '회원가입' 클릭 시 이동하는 라우터
Route::get('/join','Admin\JoinController@index')
    ->name('join');

// '로그인' 클릭 시 이동하는 라우터
Route::get('/login','Admin\LoginController@index')
    ->name('login');

Route::resource('articles','Articles\ArticlesController');

// 사용자 인증
//Route::get('/', 'Home\Home2Controller@home');

Route::get('admin/login', function(){
    $credentials = [
        'email' => 'apple@naver.com',
        'password' => '1234'
    ];
// auth() -> 도우미 함수
// attempt(array $credentials = [], bool$remember = false) 메서드 이용
//    만약 true를 준다고 하면 마이크레이션에서 봤던
//    remember_token 열과 같이 동작해서 사용자 로그인을 기억할 수 있다

    if(! auth()->attempt($credentials)){
        return '로그인 정보가 정확하지 않습니다.';
    }

//    exception error
//    try {
//
//    } catch (Exception $e) {
//        var_dump($e->getTrace());
//        exit;
//    }

    return redirect('protected');
});

Route::get('protected', function (){
    dump(session()->all());
    if(!auth()->check()){
        return '누구신가요?';
    }
    return '환영합니다.' . auth()->user()->name;
});

Route::get('admin/logout', function(){
    auth()->logout();
    return '로그아웃되었습니다.';
});
