<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // DB::table('users')->insert(
        //     [
        //         'name' => 'Super Admin 1',
        //         'email' => 'lichsuvietnam1@gmail.com',
        //         'password' => Hash::make('123456789'),
        //         'level' => 2,
        //         'active' => 1,
        //         'created_at' => date("Y-m-d H:i:s")

        //     ],
            
        // );
        // DB::table('users')->insert(
        //     [
        //         'name' => 'Super Admin 2',
        //         'email' => 'lichsuvietnam2@gmail.com',
        //         'password' => Hash::make('123456789'),
        //         'level' => 2,
        //         'active' => 1,
        //         'created_at' => date("Y-m-d H:i:s")
        //     ],
        // );

       
    }
}
