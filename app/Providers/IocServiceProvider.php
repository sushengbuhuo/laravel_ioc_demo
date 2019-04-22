<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Ioc\DemoInterface;
use App\Ioc\DemoProvider;
use App\Ioc\DemoProvider2;
class IocServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DemoInterface::class, DemoProvider2::class);
        //另一种实现
        $this->app->bind('ioc',function($v){
            return new DemoProvider2;
        });
    }
}
