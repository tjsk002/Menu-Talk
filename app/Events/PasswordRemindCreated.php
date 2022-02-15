<?php

namespace App\Events;

class PasswordRemindCreated
{
    public $email;
    public $token;

    // 이메일 발송을 이벤트로 추출하는 부분
    public function __construct($email, $token){
        $this->email = $email;
        $this->token = $token;
    }
}