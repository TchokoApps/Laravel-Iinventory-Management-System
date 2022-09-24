<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->truncate();

        $customers = [];

        $faker = Faker::create();

        foreach (range(1,5) as $value) {
            $customers[] = [
                'name' => $faker->company(),
                'mobile_number' => $faker->phoneNumber(),
                'email' => $faker->companyEmail(),
                'address' => $faker->address(),
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('customers')->insert($customers);
    }
}
