<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordsController extends Controller
{
    /*
     * 비밀번호 바꾸기 신청 폼
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getRemind()
    {
        /*
         *  로그인 전 비밀번호 찾기/변경 페이지 로드
         */
        return view('passwords.remind');
    }

    public function postRemind(Request $request)
    {
        // auth/remind -> 'as' remind.store
        // 토큰을 저장할 테이블 열이 필요한데, 라라벨에 기본 내장된 password_resets 테이블(마이그레이션)을 그대로 사용한다
        // 비밀 번호 바꾸기 신청 처리
        $this->validate($request, ['email' => 'required|email|exists:authors']);
        // 폼에서 넘겨 받은 email 필드 값이 users.email 열에 이미 있는 값이어야 한다
        $email = $request->get('email');
        $token = str_random(64);

        \DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => \Carbon\Carbon::now()->toDateString()

            // carbon -> (new Datetime)->format('Y-m-d H:i:s') 같이 사용 가능하다
            // 날짜와 시간 값을 편하게 조작할 수 있도록 돕는 외부 컴포넌트이다
        ]);

//        \Mail::send('emails.passwords.reset',compact('token'),function ($message) use ($email){
//            $message->to($email);
//            $message->subject(
//                sprintf('[%s] 비밀번호를 초기화하세요.',config('app.name'))
//            );
//        });

        event(new \App\Events\PasswordRemindCreated($email, $token));

        flash('비밀번호를 바꾸는 방법을 담은 이메일을 발송하였습니다. 메일박스를 확인해 주세요.');
        return redirect()->intended('');
    }

    public function getReset($token = null)
    {
        return view('passwords.reset', compact('token'));
    }

    /*
     * 비밀번호 바꾸기 처리
     */
    public function postReset(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:authors',
            'password' => 'required|confirmed',
            'token' => 'required'
        ]);
        $token = $request->get('token');
        if (!\DB::table('password_resets')->whereToken($token)->first()) {
            flash('URL이 정확하지 않습니다.');
            return back()->withInput();
        }

        \App\User::whereEmail($request->input('email'))->first()->update([
            'password' => bcrypt($request->input('password'))
        ]);
        \DB::table('password_resets')->whereToken($token)->delete();

        flash('비밀번호 변경이 완료되었습니다. 새로운 비밀번호로 로그인 하세요.');
        return redirect('/');
    }
}