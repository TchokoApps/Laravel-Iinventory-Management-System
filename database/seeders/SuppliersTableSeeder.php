<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->truncate();

        $suppliers = [];

        $faker = Faker::create();

        foreach (range(1,5) as $value) {
            $suppliers[] = [
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

        DB::table('suppliers')->insert($suppliers);
    }
}
