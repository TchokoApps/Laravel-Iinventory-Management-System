<?php

namespace Database\Factories;

use App\Models\InvoiceDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class InvoiceDetailFactory extends Factory
{
    protected $model = InvoiceDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => Carbon::now(),
            'invoice_id' => $this->faker->randomNumber(),
            'category_id' => $this->faker->randomNumber(),
            'product_id' => $this->faker->randomNumber(),
            'selling_qty' => $this->faker->randomFloat(),
            'selling_price' => $this->faker->randomFloat(),
            'unit_price' => $this->faker->randomFloat(),
            'status' => $this->faker->numberBetween(1, 2),
            'created_by' => $this->faker->numberBetween(1, User::all()->count()),
            'updated_by' => $this->faker->numberBetween(1, User::all()->count()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
