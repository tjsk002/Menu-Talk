<?php

namespace App;

//use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\helpsers;

function gravatar_url($email, $size = 48)
{
    return sprintf("//www.gravatar.com/%s?s=%s", md5($email, $size));
}

function gravatar_profile_url($email)
{
    return sprintf("//www.gravatar.com/%s", md5($email));
}
