<?php

use Illuminate\Http\Request;
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

DB::listen(function ($query){
// 이벤트 리스너 -> 데이터 베이스에 이벤트가 발생할 때, 엘로퀀트는 여러가지 이벤트를 던진다
// 데이터베이스 쿼리를 감시할 수 있는 방법
    var_dump($query->sql);
});


Route::get('/', 'Home\Home2Controller@home')
//    return view('layouts.header')
    -> name('home2');

// 게시판 보기
Route::get('/index', 'ArticlesController@index')
    -> name('index');

// 게시판 작성하기
//Route::get('/articleCreate', 'Articles\ArticlesController@create')
//    -> name('articleCreate');

Route::resource('articles','ArticlesController');

//Auth::routes();
//Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
//});

// 사용자 인증
//Route::get('/', 'Home\Home2Controller@home');
/*
 * 사용자 인증 재구성
 * 라라벨 내장 인증 삭제 -> 사용자 모델과 연결 되어있어 한계가 있어 수정한다
 * 삭제 시 ->
 * rm -rf resources/views/auth
 * rm -rf app/Controllers/Auth
 */

//Route::post('/login','LoginController@login');

/**
 * 라라벨 내장 인증에서 설치한 라우트 삭제 후 사용자 인증 재구성
 * Route::auth();
 * url을 하드코드로 사용하지 않고 route()를 사용한다
 */

/*
 * 사용자 가입 :: 나중에 prefix 묶어줄것
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
    });
});
*/

Route::get('auth/join',[
    'as' => 'users.create',
    'uses' => 'UsersController@create',
]);

Route::post('auth/join',[
    'as' => 'users.store',
    'uses' => 'UsersController@store',
]);

Route::get('auth/confirm/{code}',[
    'as' => 'users.confirm',
    'uses' => 'UsersController@confirm',
])->where('code','[\pL-\pN]{60}');
// 60바이트 활성화 코드로 사용자를 찾은 후, 활성화 코드는 지우고 가입 확인 여부 열은 1로 바꾼다

/*사용자 인증*/
Route::get('auth/login',[
    'as' => 'sessions.create',
    'uses' => 'SessionsController@create',
]);
Route::post('auth/login',[
    'as' => 'sessions.store',
    'uses' => 'SessionsController@store',
]);
Route::get('auth/logout',[
    'as' => 'sessions.destroy',
    'uses' => 'SessionsController@destroy',
]);

/*비밀번호 초기화*/
// as-> 라우트 이름 정의

Route::get('auth/remind',[
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind',
]);

Route::post('auth/remind',[
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind',
]);

Route::get('auth/reset/{token}',[
    'as' => 'reset.create',
    'uses' => 'PasswordsController@getReset',
])->where('token', '[\pL-\pN]{64}');
// where('token', '[\pL-\pN]{64}'); 비밀번호 바꾸기 폼 -> 라우트 보호하기

Route::post('auth/reset',[
    'as' => 'reset.store',
    'uses' => 'PasswordsController@getReset',
]);
