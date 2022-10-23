<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Database\Factories\InvoiceFactory;
use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invoice::factory(1)->create();
    }
}
