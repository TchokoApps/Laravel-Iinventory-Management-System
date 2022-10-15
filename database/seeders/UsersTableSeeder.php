<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Demo',
                'username' => 'demo',
                'email' => 'demo@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
