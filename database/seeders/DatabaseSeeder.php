<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([UsersTableSeeder::class, SuppliersTableSeeder::class, CustomersTableSeeder::class,
            CategoriesTableSeeder::class, ProductsTableSeeder::class, UnitsTableSeeder::class,
            HomeSlidesTableSeeder::class, InvoiceTableSeeder::class, InvoiceDetailSeeder::class, PaymentDetailSeeder::class, PaymentSeeder::class]);
    }
}
