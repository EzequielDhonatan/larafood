<?php

namespace App\Repositories\Contracts\Category;

interface CategoryRepositoryInterface
{
    public function getCategoriesByTenantUuid( string $uuid );
    public function getCategoriesByTenantId( int $idTenant );
    public function getCategoryByUrl( string $url );

} // CategoryRepositoryInterface
