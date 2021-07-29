<?php

namespace App\Repositories\Contracts\Category;

interface CategoryRepositoryInterface
{
    public function getCategoriesByTenantUuid( string $uuid );
    public function getCategoriesByTenantId( int $idTenant );

} // CategoryRepositoryInterface
