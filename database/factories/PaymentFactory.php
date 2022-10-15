<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_id' => $this->faker->numberBetween(1, Invoice::all()->count()),
            'customer_id' => $this->faker->numberBetween(1, Customer::all()->count()),
            'paid_status' => $this->faker->word,
            'paid_amount' => $this->faker->randomFloat(),
            'due_amount' => $this->faker->randomFloat(),
            'total_amount' => $this->faker->randomFloat(),
            'discount_amount' => $this->faker->randomFloat(),
            'created_by' => $this->faker->numberBetween(1, User::all()->count()),
            'updated_by' => $this->faker->numberBetween(1, User::all()->count()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
