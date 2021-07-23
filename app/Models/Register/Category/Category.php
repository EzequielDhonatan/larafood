<?php

namespace App\Models\Register\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Tenant\Traits\TenantTrait;

class Category extends Model
{
    use HasFactory;
    use TenantTrait;

    protected $fillable = [ 'name', 'url', 'description' ];

    public function search( $filter = null )
    {
        $results = $this->where( 'name', 'LIKE', "%{$filter}%" )
                        ->orWhere( 'description', 'LIKE', "%{$filter}%" )
                        ->latest()
                        ->paginate();

        return $results;

    } // search

} // Category
