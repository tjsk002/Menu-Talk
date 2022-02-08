<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        /* 사용자 등록 요청 정리
         * 사용자가 회원 가입 폼에 내용을 채워 전송했을 때의 처리 로직
         */
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:authors',
//           // unique:authors -> 유효한 이메일 형싱, authors 테이블에서 유일해야한다
            'password' => 'required|confirmed|min:6',
            // confirmed -> 검사할 필드의 값과 검사할 필드_confirmed 같아야한다
        ]);
        $user = \App\User::create([
            'name'=>$request->input('name'),
            //  Request::input('name')과 같다
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);

        auth()->login($user);
        // 생성한 사용자 객체로 로그인한다
        flash(auth()->user()->name . '님 환영합니다');

        return redirect(home);
    }
}
