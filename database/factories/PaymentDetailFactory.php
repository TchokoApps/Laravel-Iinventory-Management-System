<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\PaymentDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PaymentDetailFactory extends Factory
{
    protected $model = PaymentDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_id' => $this->faker->numberBetween(1, Invoice::all()->count()),
            'current_paid_amount' => $this->faker->randomFloat(),
            'date' => Carbon::now(),
            'created_by' => $this->faker->numberBetween(1, User::all()->count()),
            'updated_by' => $this->faker->numberBetween(1, User::all()->count()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
