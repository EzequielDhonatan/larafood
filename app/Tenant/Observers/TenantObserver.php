<?php

namespace App\Tenant\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Tenant\Manager\TenantManager;

class TenantObserver
{
    /**
     * Handle the Category "creating" event.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function creating( Model $model )
    {
        $tenantManager = app( TenantManager::class );

        $model->tenant_id = $tenantManager->getTenantIdentify();
    }

} // TenantObserver
