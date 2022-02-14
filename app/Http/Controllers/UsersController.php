<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * 사용자 등록
     */
    public function __construct()
    {
       $this->middleware('guest')->except('logout');
       // except logout 제외
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        /* 사용자 등록 요청 정리
         * 사용자가 회원 가입 폼에 내용을 채워 전송했을 때의 처리 로직
         */

        $this->validate($request, [
            // input 입력값
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:authors',
//           // unique:authors -> 유효한 이메일 형싱, authors 테이블에서 유일해야한다
            'password' => 'required|confirmed|min:2',
//            'business_number' => 'required|min:10|max:12'
            // confirmed -> 검사할 필드의 값과 검사할 필드_confirmed 같아야한다
        ]);
       $confirmCode = str_random(60);
//        var_dump(1); exit();
//        flash('111');

        $user = \App\User::create([
            // DB에 입력한 값 input
            'name' => $request->input('name'),
            //  Request::input('name')과 같다
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'confirmCode'=> $confirmCode,
//            'businessNumber' => $request->input('business_number')
        ]);

        auth()->login($user);
        flash(auth()->user()->name . '님 환영합니다.');

        /**
         * 이메일 보내기 추출 -> 컨트롤러에서 가입 확인 메일을 보내지말고, 이벤트를 던져 이벤트 리스너에서 메일을 보낸다
         */

        event(new \App\Events\UserCreated($user));
//        \Mail::send('emails.auth.confirm',compact('user'), function ($message)use($user){
//        event(new \App\Events\UserCreated($user));
//            $message->to($user -> email);
//            $message->subject(
//                sprintf('[%s 회원가입을 확인해 주세요.]', config('app.name'))
//            );
//        });

        return $this->respondCreated('가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입 확인 하시고 로그인해 주세요.');
//        flash('가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입 확인 하시고 로그인해 주세요.');
//        return redirect('/');

//        auth()->login($user);
        // 생성한 사용자 객체로 로그인한
//        flash(auth()->user()->name . '님 환영합니다');
    }

    protected function respondCreated($message)
    {
        flash($message);
        return redirect('/');
    }

    public function confirm($code)
    {
        $user = \App\User::whereConfirmCode($code)->first();

        if (!$user) {
            flash('URL이 정확하지 않습니다.');
            return redirect('/');
        }
        $user->activated = 1;
        $user->confirm_code = null;
        $user->save();

        auth()->login($user);
        flash(auth()->user()->name . '님 환영합니다. 가입 확인되었습니다.');

        return redirect('/');
    }


}
