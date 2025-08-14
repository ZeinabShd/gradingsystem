<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::share('year', date('Y'));
        View::share('appName', 'Grading System');
        View::share('developer', 'Zeinab');
        View::share('version', '1.0.0');
    }
}
