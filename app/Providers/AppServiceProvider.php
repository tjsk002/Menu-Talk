<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 어디서든 서비스 프로바이더를 등록할 수 있다
        if ($this->app->environment('local')) {
            $this->app->register(ServiceProvider::class);
        }
    }
}
