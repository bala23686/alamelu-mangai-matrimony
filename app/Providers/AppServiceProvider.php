<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrap();

        //telescope for local developement environment
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }

        /*this macro is added by saravana sai
        */
        Http::macro('payumoney', function () {
            return Http::withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded',

            ])->acceptJson()->baseUrl('https://test.payu.in/merchant');
        });


        Config::set('app.locale', env('APP_LANG'));

        Blade::component('components.user-dashboard.Sidebar', Sidebar::class);
    }
}
