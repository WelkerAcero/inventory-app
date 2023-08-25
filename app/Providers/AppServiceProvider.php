<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*      
        $this->app->bind('path.public', function () {
            return base_path('public_html');
        }); 
        */
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Sanctum::ignoreMigrations(); */
        Paginator::useBootstrap();
        //resolve(\Illuminate\Routing\UrlGenerator::class)-**texto en negrita**>forceScheme('https');
    }
}
