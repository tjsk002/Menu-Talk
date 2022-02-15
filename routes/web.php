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
//Route::get('/board', 'Board\BoardController@board')
//    -> name('board');

// board page -> '글쓰기' 버튼 클릭 시
//Route::get('/boardWrite', 'Board\BoardController@write')
//    ->name('boardWrite');

// 게시판 보기
Route::get('/index', 'Articles\ArticlesController@index')
    -> name('index');

// 게시판 작성하기
//Route::get('/articleCreate', 'Articles\ArticlesController@create')
//    -> name('articleCreate');

// '회원가입' 클릭 시 이동하는 라우터
//Route::get('/join','Auth\JoinController@index')
//    ->name('join');
//
//// '로그인' 클릭 시 이동하는 라우터
//Route::get('/login','Auth\LoginController@index')
//    ->name('login');

Route::resource('articles','Articles\ArticlesController');

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

//Route::get('remind/create',[
//    'as' => 'remind.create',
//    'uses' => 'RemindController@create',
//]);

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


//Route::post('admin/login', function(Request $req){
//    $credentials = [
////        'email' => 'apple@naver.com',
////        'email'=> route('admin/login'),
//    /*
//     * DB에 있는 해싱되어있는 비밀번호 = 1234
//     * 'password' => Hash::make('1234')
//     * 혹은 php artisan tinker 에 bcrypt('1234')를 입력해준다
//     */
////        'password' => Hash::make('1234')
////        'password' => '1234'
//    ];
//
//// auth() -> 도우미 함수
//// attempt(array $credentials = [], bool$remember = false) 메서드 이용
////    만약 true 준다고 하면 마이크레이션에서 봤던
////    remember_token 열과 같이 동작해서 사용자 로그인을 기억할 수 있다
//
//    if(! auth()->attempt($credentials)){
//        dd($credentials);
//        return '로그인 정보가 정확하지 않습니다.';
//    }
//
////    exception error
////    try {
////
////    } catch (Exception $e) {
////        var_dump($e->getTrace());
////        exit;
////    }
//
//    return redirect('protected');
//});

//Route::get('protected', function (){
//    // 세션에 저장된 값을 덤프하는 코드
//    dump(session()->all());
//    if(!auth()->check()){
//        // check() url 요청한 브라우저 로그인 한 상태면 true 반환한다
//        // auth() -> check() 없으면 errorException
//        return '누구신가요?';
//    }
//    return '환영합니다.' . auth()->user()->name;
//});
//
//Route::get('admin/logout', function(){
//    auth()->logout();
//    return '로그아웃되었습니다.';
//});
//
//Auth::routes();

// end

//Route::get('/', 'Home\Home2Controller@home')->name('home2');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
