<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';


    protected  $web_Admin_routes_path = [
        ['folder' => 'auth', 'file' => 'auth_routes'],
        ['folder' => 'masters', 'file' => 'mastes_routes'],
        ['folder' => 'usermanagement', 'file' => 'user_management_routes'],
        ['folder' => 'productsetting', 'file' => 'productsetting_routes'],
        ['folder' => 'usertransaction', 'file' => 'usertransaction_routes'],
        ['folder' => 'reports', 'file' => 'reports_routes'],
        ['folder' => 'payments', 'file' => 'payments_routes'],
    ];

    protected  $api_routes_path = [
        ['folder' => 'RasiMaster', 'file' => 'rasi_routes'],
        ['folder' => 'Authentication', 'file' => 'user_auth_routes'],
        ['folder' => 'Masters', 'file' => 'masters_routes'],
        ['folder' => 'UserTransaction', 'file' => 'user_transaction_routes'],
        ['folder' => 'Users', 'file' => 'users_routes'],
    ];
    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));


             //Route for api controlls
             foreach ($this->api_routes_path as $route) {

                Route::prefix('api/v1/')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path("routes/Api/v1/{$route['folder']}/{$route['file']}.php"));

            }


             //Route for Admin side web controlls
             foreach ($this->web_Admin_routes_path as $route) {
                Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path("routes/web/admin/{$route['folder']}/{$route['file']}.php"));
            }

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
