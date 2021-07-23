<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\{
    Register\Plan\Plan,
    Tenant\Tenant,
    Register\Category\Category
};

use App\Observers\{
    Register\Plan\ObserverPlan,
    Tenant\ObserverTenant,
    Register\Category\ObserverCategory
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
        Plan::observe( ObserverPlan::class );
        Tenant::observe( ObserverTenant::class );
        Category::observe( ObserverCategory::class );
    }

} // AppServiceProvider
