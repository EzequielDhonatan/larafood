<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\{
    User,
    Register\Plan\Plan
};

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [

        'plan_id', 'cnpj', 'name', 'url', 'email', 'logo',
        'active', 'subscription', 'expires_at',
        'subscription_id', 'subscription_active', 'subscription_suspended'

    ]; // protect $fillable

    public function users()
    {
        return $this->hasMany( User::class );
    }

    public function plan()
    {
        return $this->belongsTo( Plan::class );
    }

} // Tenant
