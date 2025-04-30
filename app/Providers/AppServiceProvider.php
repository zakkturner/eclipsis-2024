<?php

namespace App\Providers;

use App\Models\Cta;
use App\Observers\CtaObserver;
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
        //
        Cta::observe(CtaObserver::class);
    }
}
