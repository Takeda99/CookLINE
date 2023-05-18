<?php

namespace App\Providers;
//テスト用↓
use Illuminate\Support\Facades\URL;
//テスト用↑
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //テスト用↓
        #URL::forceScheme('https');
        //テスト用↑
    }
}
