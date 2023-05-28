<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /**
     * 로그인/로그아웃
     */
    public function __construct()
    {
        $this->middleware('guest',['except'=>'destroy']);
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
        $this->validate($request, [
            'email'=>'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'password'=>'required|min:2'
        ]);

//        try {
//            flash('이메일 또는 비밀번호가 맞지 않습니다. 다시 확인해 주세요.');
//        }catch (\Exception $e){
//          throw new Exception('Email Password Error '.$e);
//        }

        if(!auth()->attempt($request->only('email','password'),$request->has('remember'))){
//            var_dump($this->respondError('이메일 또는 비밀번호가 맞지 않습니다.')); exit();
//        if(!auth()->attempt($request->only('email','password'))){
            flash('이메일 또는 비밀번호가 맞지 않습니다');
            return back()->withInput();
//            return $this->respondError('이메일 또는 비밀번호가 맞지 않습니다.');
        }

        /**
         * 가입 확인을 하지 않은 사용자를 검사
         * activated = 0 이라면, 직전 if 문에서 로그인을 취소한다
         */
        if(!auth()->user()->activated){
            auth()->logout();
            flash('메일에서 가입 확인해 주세요.');
            return back()->withInput();
        }

        flash(auth()->user()->name . '님 환영합니다.');
        return redirect()->intended('/');
        // 'auth' 미들웨어가 작동해서 로그인 페이지로 들어왔을 때, intended 메서드는 사용자가 원래 접근하려고 했던 url 리디렉션 해준다
    }

    public function respondError($message){
//        flash()->error($message);
        return back()->withInput();
    }

    protected function respondCreated($token)
    {
        return response()->json([
            'token' => $token,
        ], 201, [], JSON_PRETTY_PRINT);
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
