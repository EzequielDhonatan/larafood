<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Register\Plan\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([

            'name'          => 'Business',
            'url'           => 'business',
            'price'         => 499.99,
            'description'   => 'Plano empresarial'

        ]); // User::create

    } // run

} // PlanSeeder
