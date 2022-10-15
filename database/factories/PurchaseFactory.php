<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'supplier_id' => $this->faker->numberBetween(1, Supplier::all()->count()),
            'category_id' => $this->faker->numberBetween(1, Category::all()->count()),
            'product_id' => $this->faker->numberBetween(1, Product::all()->count()),
            'purchase_no' => $this->faker->swiftBicNumber,
            'date' => Carbon::now(),
            'description' => $this->faker->text,
            'buying_qty' => $buying_qty = $this->faker->numberBetween(1, 100),
            'unit_price' => $unit_price = $this->faker->numberBetween(10, 100),
            'buying_price' => $unit_price * $buying_qty,
            'status' => $this->faker->numberBetween(0, 1),
            'created_by' => $this->faker->numberBetween(1, User::all()->count()),
            'updated_by' => $this->faker->numberBetween(1, User::all()->count()),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
