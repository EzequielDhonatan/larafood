<?php

namespace App\Models\System\Panel\Register\DetailPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\System\Panel\Register\Plan\Plan;

class DetailPlan extends Model
{
    use HasFactory;

    protected $table = 'details_plan';

    protected $fillable = [ 'name' ];

    public function plan()
    {
        $this->belongsTo( Plan::class );
    }

} // DetailPlan
