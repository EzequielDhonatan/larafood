<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\{
    Register\Plan\Plan,
    Tenant\Tenant,
    Register\Category\Category,
    Register\Product\Product
};

use App\Observers\{
    Register\Plan\ObserverPlan,
    Tenant\ObserverTenant,
    Register\Category\ObserverCategory,
    Register\Product\ObserverProduct
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
        Plan::observe( ObserverPlan::class ); ## PLAN
        Tenant::observe( ObserverTenant::class ); ## TENANT
        Category::observe( ObserverCategory::class ); ## CATEGORY
        Product::observe( ObserverProduct::class ); ## PRODUCT
    }

} // AppServiceProvider
