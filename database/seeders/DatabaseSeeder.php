<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        \DB::table('admins')->insert([
            'name' => 'HHGiangNA',
            'email' => 'hhgiang.itdev@gmail.com',
            'phone' => '0337302525',
            'password' => Hash::make('123456789')
        ]);
    }
}
