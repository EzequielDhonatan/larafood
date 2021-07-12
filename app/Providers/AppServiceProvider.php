<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\System\Panel\Register\Plan\Plan;
use App\Observers\System\Panel\Register\PlanObserver;

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
        Plan::observe( PlanObserver::class );
    }
}
