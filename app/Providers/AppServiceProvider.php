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

use App\Repositories\Contracts\{
    Tenant\TenantRepositoryInterface
};

use App\Repositories\{
    Tenant\TenantRepository
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
        $this->app->bind(

            TenantRepositoryInterface::class,
            TenantRepository::class

        ); //
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
