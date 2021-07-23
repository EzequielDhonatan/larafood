<?php

namespace App\Models\Register\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Tenant\Traits\TenantTrait;
use App\Models\Register\Category\Category;

class Product extends Model
{
    use HasFactory, TenantTrait;

    protected $fillable = [ 'category_id', 'title', 'flag', 'image', 'price', 'description' ];

    public function categories()
    {
        return $this->belongsTo( Category::class );
    }

} // Product
