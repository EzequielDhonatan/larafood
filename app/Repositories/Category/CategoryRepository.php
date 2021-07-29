<?php

namespace App\Repositories\Category;

use App\Repositories\Contracts\Category\CategoryRepositoryInterface;

use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'categories';
    }

    public function getCategoriesByTenantUuid( string $uuid )
    {
        return $this->DB::table( $this->table )
                            ->join( 'tenants', 'tenants.id', '=', 'categories.tenant_id' )
                            ->where( 'tenants.uuid', $uuid )
                            ->select( 'categories.*' )
                            ->get();
    }

    public function getCategoriesByTenantId( int $idTenant )
    {
        return DB::table( $this->table )->where( 'tenant_id', $idTenant )->get();
    }

} // CategoryRepository
