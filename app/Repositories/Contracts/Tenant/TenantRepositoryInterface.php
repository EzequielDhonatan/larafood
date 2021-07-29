<?php

namespace App\Repositories\Contracts\Tenant;

interface TenantRepositoryInterface
{
    public function getAllTenants();
    public function getTenantByUuid( string $uuid );

} // TenantRepositoryInterface
