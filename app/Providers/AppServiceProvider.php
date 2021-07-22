<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\{
    Register\Plan\Plan,
    Tenant\Tenant
};

use App\Observers\{
    Register\PlanObserver,
    Tenant\TenantObserver
};

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
        Tenant::observe( TenantObserver::class );
    }

} // AppServiceProvider
