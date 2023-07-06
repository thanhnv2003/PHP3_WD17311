<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => fake()->name(),
            'category_id' => fake()->unique()->numberBetween(),
            'price' => fake()->numberBetween(),
            'date_add' => fake()->date('Y-m-d', 'now'),
            'status' => 1
        ];
    }
}
