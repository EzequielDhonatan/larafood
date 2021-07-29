<?php

namespace App\Services\Tenant;

use Illuminate\Support\Facades\Hash;

use App\Models\Register\Plan\Plan;

use App\Repositories\Contracts\Tenant\TenantRepositoryInterface;

class TenantService
{
    private $plan, $input = [];
    private $repository;

    public function __construct( TenantRepositoryInterface $repository )
    {
        $this->repository = $repository;
    }

    public function getAllTenants()
    {
        return $this->repository->getAllTenants();
    }

    public function getTenantByUuid( string $uuid )
    {
        return $this->repository->getTenantByUuid( $uuid );
    }

    public function make( Plan $plan, array $input )
    {
        $this->plan     = $plan;
        $this->input    = $input;

        $tenant = $this->storeTenant();

        $user = $this->storeUser( $tenant );

        return $user;

    } // make

    public function storeTenant()
    {
        $input = $this->input;

        return $this->plan->tenants()->create([

            'cnpj'              => $this->input[ 'cnpj' ],
            'name'              => $this->input[ 'empresa' ],
            'email'             => $this->input[ 'email' ],
            'subscription'      => now(),
            'expires_at'        => now()->addDays( 7 )

        ]); // return

    } // storeTenant

    public function storeUser( $tenant  )
    {
        $input = $this->input;

        $user = $tenant->users()->create([

            'name'      => $this->input[ 'name' ],
            'email'     => $this->input[ 'email' ],
            'password'  => Hash::make( $this->input[ 'password' ] ),

        ]); // user

        return $user;

    } // storeUser

} // TenantService
