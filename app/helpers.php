<?php

namespace App;

use Illuminate\Support\Facades\Auth;

/**
 * 컨트롤러와 도우미 함수
 * 사용자 정의 도우미 함수
 *
 * 함수간 이름 충돌이 발생하면, 나중에 로드(load)된 함수가 먼저 로드된 함수를 오버라이드 한다.
 * 의도적으로 오버라이드하는 것이 아니라면 function_exists()를 쓰는것이 좋다
 */
if(! function_exists('markdown')){
    function markdown($text = null){
        return app(\ParsedownExtra::class)->text($text);
    }
}

function gravatar_url($email, $size = 48)
{
    return sprintf("//www.gravatar.com/%s?s=%s", md5($email, $size));
}

function gravatar_profile_url($email)
{
    return sprintf("//www.gravatar.com/%s", md5($email));
}