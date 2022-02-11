<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $subscribe = [
        // UserEventListener 등록함으로써 이벤트 리스너임과 동시에 이벤트 구독자가 된다.
        \App\Listeners\UsersEventListener::class,
    ];
}
