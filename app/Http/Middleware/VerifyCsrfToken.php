<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        // 포스트맨에서 _token 값 없이 테스트 하는 행위 자체가 csrf 공격이라고 할 수 있다
        // 테스트를 위해 보호 기능 잠시 끄는 코드
        '*',
        'articles',
        'articles/*'
    ];
}
