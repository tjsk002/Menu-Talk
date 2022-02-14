<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Request;

/**
 * 이벤트 구독자 구현
 */
class UsersEventListener{
    /**
     * @param \Illminate\Events\Dispatcher $events
     * @return void
     * 이벤트 구독자에 이벤트를 등록하고 소비하자
     */
    public function subscribe(\Illminate\Events\Dispatcher $events){
        $events->listen(
//            이벤트 구독자에게 이벤트 매칭을 위임한 것 : 수신
            \App\Events\UserCreated::class,
            \App\Events\PasswordRemindCreated::class,
            // UserCreated 이벤트를 자기 자신의 onUserCreated()메서드 연결하는 구문
            __CLASS__ . '@onUserCreated',
            __CLASS__ . '@onPasswordRemindCreated'
        );
    }

    public function onUserCreated(\App\Events\UserCreated $events){
        // 실제 동작하는 구간
        $user = $events->user;
        \Mail::send('emails.auth.confirm',compact('user'), function ($message)use($user){
            $message->to($user -> email);
            $message->subject(
                sprintf('[%s    회원가입을 확인해 주세요.]', config('app.name'))
            );
        });
    }

    /**
     * @param \App\Events\PasswordRemindCreated $events
     * @return void
     * 이벤트 구독자에 이벤트를 등록하고 소비하자
     */

    public function onPasswordRemindCreated(\App\Events\PasswordRemindCreated $events){
        \Mail::send('emails.passwords.reset',
            ['token'=>$events->token],
            function ($message) use ($events){
            $message->to($events->email);
            $message->subject(
                sprintf('[%s] 비밀번호를 초기화하세요.', config('app.name'))
            );
            }
        );
    }

}