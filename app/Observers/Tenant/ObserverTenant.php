<?php

namespace App\Observers\Tenant;

use App\Models\Tenant\Tenant;
use Illuminate\Support\Str;

class ObserverTenant
{
     /**
     * Handle the tenant "creating" event.
     *
     * @param  \App\Models\Tenant\Tenant  $tenant
     * @return void
     */
    public function creating( Tenant $tenant )
    {
        $tenant->uuid = Str::uuid();
        $tenant->url = Str::kebab( $tenant->name );
    }

    /**
     * Handle the tenant "updating" event.
     *
     * @param  \App\Models\Tenant\Tenant  $tenant
     * @return void
     */
    public function updating( Tenant $tenant )
    {
        $tenant->url = Str::kebab( $tenant->name );
    }

} // ObserverTenant
