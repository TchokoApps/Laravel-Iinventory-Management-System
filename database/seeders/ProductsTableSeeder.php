<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        DB::table('products')->truncate();

        $products = [];

        $faker = Faker::create();

        foreach (range(1, 10) as $value) {
            $products[] = [
                'name' => $faker->city(),
                'quantity' => $faker->numberBetween(1, 50),
                'supplier_id' => $faker->numberBetween(1, 5),
                'category_id' => $faker->numberBetween(1, 10),
                'unit_id' => $faker->numberBetween(1, 2),
                'status' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('products')->insert($products);
    }
}
