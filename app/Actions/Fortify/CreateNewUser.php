<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use App\Services\Tenant\ServiceTenant;

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

        $serviceTenant = app( ServiceTenant::class );
        $user = $serviceTenant->make( $plan, $input );

        return $user;

    } // create
}
