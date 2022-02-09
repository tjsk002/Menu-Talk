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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:authors',
//           // unique:authors -> 유효한 이메일 형싱, authors 테이블에서 유일해야한다
            'password' => 'required|confirmed|min:6',
            // confirmed -> 검사할 필드의 값과 검사할 필드_confirmed 같아야한다
        ]);
        $confirmCode = str_random(60);

        $user = \App\User::create([
            'name'=>$request->input('name'),
            //  Request::input('name')과 같다
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
//            'confirmCode'=> $confirmCode,
        ]);

        auth()->login($user);
        flash(auth()->user()->name . '님 환영합니다.');
//        \Mail::send('emails.auth.confirm',compact('user'), function ($message)use($user){
//            $message->to($user -> email);
//            $message->subject(
//                sprintf('[%s    회원가입을 확인해 주세요.]', config('app.name'))
//            );
//        });

//        flush('가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입 확인 하시고 로그인해 주세요.');

        return redirect('home2');

//        auth()->login($user);
        // 생성한 사용자 객체로 로그인한
//        flash(auth()->user()->name . '님 환영합니다');
    }

    public function confirm($code){
        $user = \App\User::whereConfirmCode($code)->first();

        if(!$user){
            flash('url이 정확하지 않습니다.');
            return redirect('/');
        }
        $user->activated = 1;
        $user->confirm_code = null;
        $user->save();

        auth()->login($user);
        flash(auth()->user()->name . '님 환영합니다.');

        return redirect('home2');
    }
}
