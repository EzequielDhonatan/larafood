<?php

namespace App\Repositories\Contracts\Tenant;

interface TenantRepositoryInterface
{
    public function getAllTenants( int $per_page );
    public function getTenantByUuid( string $uuid );

} // TenantRepositoryInterface
