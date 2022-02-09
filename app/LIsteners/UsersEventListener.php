<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Request;

class UserEventListener{
    public function subscribe(\Illminate\Event\Dispactcher $events){
        $events->listen(
//            이벤트 구독자에게 이벤트 매칭을 위임한 것
            \App\Events\UserCreated::class,
            // UserCreated 이벤트를 자기 자신의 onUserCreated()메서드 연결하는 구문
            __CLASS__ . '@onUserCreated'
        );
    }

    public function onUserCreated(\Illminate\Event\UserCreated $events){
        $user = $events->user;
        \Mail::send('emails.auth.confirm',compact('user'), function ($message)use($user){
            $message->to($user -> email);
            $message->subject(
                sprintf('[%s    회원가입을 확인해 주세요.]', config('app.name'))
            );
        });
    }


}