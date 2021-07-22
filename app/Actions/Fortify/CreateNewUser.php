<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make( $input, [

            'cnpj'      => [ 'required', 'unique:tenants' ],
            'empresa'   => [ 'required', 'unique:tenants,name' ],
            'name'      => [ 'required', 'string', 'max:255' ],
            'email'     => [ 'required', 'string', 'email', 'max:255', 'unique:users' ],
            'password'  => $this->passwordRules(),
            'terms'     => Jetstream::hasTermsAndPrivacyPolicyFeature() ? [ 'required', 'accepted' ] : '',

        ])->validate();


        if ( !$plan = session( 'plan' ) )
            return redirect()->route( 'site.home' );

        $tenant = $plan->tenants()->create([

            'cnpj'              => $input[ 'cnpj' ],
            'name'              => $input[ 'empresa' ],
            'url'               => Str::kebab( $input[ 'empresa' ] ),
            'email'             => $input[ 'email' ],
            'subscription'      => now(),
            'expires_at'        => now()->addDays( 7 )

        ]);

        $user = $tenant->users()->create([

            'name'      => $input[ 'name' ],
            'email'     => $input[ 'email' ],
            'password'  => Hash::make( $input[ 'password' ] ),

        ]);

        return $user;
    }
}
