<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('a',['except'=>'destroy']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\View\View
     */
    public function create(){
        return view('sessions.create');
    }

    /**
     * @param Request $requset
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request){
//        flash('s');
//        dump('1'); exit;
        $this->validate($request, [
            'email'=>'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'password'=>'required|min:2'
        ]);

//        if(!auth()->attempt($request->only('email','password'),$request->has('remember'))){

        if(!auth()->attempt($request->only('email','password'))){
            flash('이메일 또는 비밀번호가 맞지 않습니다');
//            return back()->withInput();
            return $this->respondError('이메일 또는 비밀번호가 맞지 않습니다.');
        }
        // @를 포항해주세요.

        /**
         * 가입 확인을 하지 않은 사용자를 검사
         * activated = 0 이라면, 직전 if 문에서 로그인을 취소한다
         */
        if(!auth()->user()->activated){
            auth()->logout();
            flash('가입 확인해 주세요.');
             return back()->withInput();
        }

        flash(auth()->user()->name . '님 환영합니다.');
//        dump('2'); exit;
        return redirect()->intended('/');
    }

    public function respondError($message){
//        flash()->error($message);
        return back()->withInput();
    }

    /**
     * @return \Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 로그아웃 요청 처리
     */
    public function destroy()
    {
        auth()->logout();
        flash('로그아웃되었습니다.');

        return redirect('/');
    }
}
