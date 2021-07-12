<?php

namespace App\Models\System\Panel\Register\Plan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'price', 'url', 'description' ];

    public function search( $filter = null )
    {
        $results = $this->where( 'name', 'LIKE', "%{$filter}%" )
                        ->orWhere( 'description', 'LIKE', "%{$filter}%" )
                        ->latest()
                        ->paginate();

        return $results;

    } // search

} // Plan
