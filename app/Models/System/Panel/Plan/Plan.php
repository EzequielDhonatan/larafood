<?php

namespace App\Models\System\Panel\Plan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'price', 'url', 'description' ];

} // Plan
