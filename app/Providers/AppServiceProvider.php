<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\{
    Register\Plan\Plan,
    Tenant\Tenant,
    Register\Category\Category
};

use App\Observers\{
    Register\Plan\PlanObserver,
    Tenant\TenantObserver,
    Register\Category\CategoryObserver
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
        Category::observe( CategoryObserver::class );
    }

} // AppServiceProvider
