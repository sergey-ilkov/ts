<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        RateLimiter::for('user-auth', function (Request $request) {
            return Limit::perMinute(env('LIMIT_AUTH_REQUEST', 10))->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('secret', function (Request $request) {
            return Limit::perMinute(env('LIMIT_SECRET_REQUEST', 10))->by($request->user()?->id ?: $request->ip());
        });
        RateLimiter::for('feedback', function (Request $request) {
            return Limit::perMinute(env('LIMIT_FEEDBACK_REQUEST', 10))->by($request->user()?->id ?: $request->ip());
        });

        // ? Preventing Lazy Loading
        Model::preventLazyLoading(! $this->app->isProduction());
    }
}
