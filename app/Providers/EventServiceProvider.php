<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{


    protected $subscribe = [
        // 라우팅 정의 파일이 http 요청 url(을) 수신하고 처리하는 컨트롤러로 연결하듯이,
        // 이벤트에서도 같은 구실을 하는 전용 파일이다
        // UserEventListener 등록함으로써 이벤트 리스너임과 동시에 이벤트 구독자가 된다.
        \App\Listeners\UsersEventListener::class,
    ];

    protected $listen = [
//        \Illuminate\Auth\Events\Login::class => [
//            \App\Listeners\UsersEventListener::class,
//        ],
//        \App\Events\ArticlesEvent::class => [
//            \App\Listeners\ArticlesEventListener::class,
//        ],
//        \App\Events\CommentsEvent::class => [
//            \App\Listeners\CommentsEventListener::class,
//        ],
//        \App\Events\ModelChanged::class => [
//            \App\Listeners\CacheHandler::class,
//        ],
    ];

    public function boot(){
//        parent::boot();
        // 이벤트 리스너 -> 데이터 베이스에 이벤트가 발생할 때, 엘로퀀트는 여러가지 이벤트를 던진다
        // 데이터베이스 쿼리를 감시할 수 있는 방법
        \Event::listen(
            'article.created',
            function($article){
            \App\Listeners\ArticlesEventListener::class;
        });
    }
}
