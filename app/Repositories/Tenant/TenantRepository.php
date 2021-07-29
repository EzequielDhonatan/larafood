<?php

namespace App\Repositories\Tenant;

use App\Repositories\Contracts\Tenant\TenantRepositoryInterface;

use App\Models\Tenant\Tenant;

class TenantRepository implements TenantRepositoryInterface
{
    protected $entity;

    public function __construct( Tenant $tenant )
    {
        $this->entity = $tenant;
    }

    public function getAllTenants()
    {
        return $this->entity->all();
    }

    public function getTenantByUuid( string $uuid )
    {
        return $this->entity->where( 'uuid', $uuid )->first();
    }

} // TenantRepository
