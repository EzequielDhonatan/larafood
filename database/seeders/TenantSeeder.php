<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\{
    Register\Plan\Plan,
    Tenant\Tenant
};

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([

            'cnpj'      => '99.999.999-99',
            'name'      => 'Ezequiel Dhonatan',
            'url'       => 'ezequiel-dhonatan',
            'email'     => 'Suporte@ezequieldhonatan.com.br'

        ]);

    } // run

} // TenantSeeder
