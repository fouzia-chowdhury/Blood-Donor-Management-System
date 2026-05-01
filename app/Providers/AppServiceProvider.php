<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // 

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
        // Ngrok ba production-e HTTPS force korar jonno
        if (config('app.env') !== 'local' || env('NGROK_URL')) {
            URL::forceScheme('https');
        }
    }
}