<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name'      => 'Ezequiel Dhonatan',
            'email'     => 'Suporte@ezequieldhonatan.com.br',
            'password'  => bcrypt( '123456789' )

        ]); // User::create

    } // run

} // UserSeeder
