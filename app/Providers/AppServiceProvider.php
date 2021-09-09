<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //この行を追加
use Illuminate\Support\Facades\URL;    //この行を追加
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
        //
        Schema::defaultStringLength(191);   //この行を追加（mysqlのバージョンに合わしてる。詳細不明）
        URL::forceScheme('https');          //この行を追加（常にhttps通信を行う設定、AWSの場合必要、ローカルの場合は不要）
    }
}
