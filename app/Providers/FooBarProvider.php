<?php

namespace App\Providers;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FooBarProvider extends ServiceProvider implements DeferrableProvider
{
    // untuk kasus sederhana
    public array $singletons = [
        HelloService::class => HelloServiceIndonesia::class
    ];

    /**
     * Register services.
     *
     * @return void
     */

    // untuk registrasi dependency 
    // jangan melakukan code selain registrasi dependency
    public function register()
    {
        echo "FooBarServiceProvider";
        $this->app->singleton(Foo::class, function($app) {
            return new Foo();
        });

        $this->app->singleton(Bar::class, function($app){
            return new Bar($app->make(Foo::class));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */

    // bisa melakukan code apapun setelah function register selesai di panggil
    public function boot()
    {
        
    }

    //deferable provider
    public function provides()
    {
        return [HelloService::class, Foo::class, Bar::class];
    }
}
