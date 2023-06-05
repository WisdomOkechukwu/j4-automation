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
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
            ->group(base_path('routes/auth.php'));
            
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web','auth'])
                ->group(base_path('routes/helper.php'));

            Route::prefix('admin')
                ->middleware(['web','auth','admin'])
                ->namespace($this->namespace.'\Admin')
                ->group(base_path('routes/admin.php'));

            Route::prefix('operator')
                ->middleware(['web','auth','operator'])
                ->namespace($this->namespace.'\Operator')
                ->group(base_path('routes/operator.php'));
                
            Route::prefix('field-worker')
                ->middleware(['web','auth','field.worker'])
                ->namespace($this->namespace.'\FieldWorker')
                ->group(base_path('routes/fieldworker.php'));  
                
            Route::prefix('field-admin')
                ->middleware(['web','auth','field.admin'])
                ->namespace($this->namespace.'\FieldAdmin')
                ->group(base_path('routes/fieldadmin.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
