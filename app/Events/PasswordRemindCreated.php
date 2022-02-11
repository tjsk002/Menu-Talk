<?php

namespace App\Events;

class PasswordRemindCreated
{
    public $email;
    public $token;

    public function __construct($email, $token){
        $this->email = $email;
        $this->token = $token;
    }
}