<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = [];
        for ($i = 0; $i < 5; $i++){
            $name = 'No image';
            array_push($image, $name);
        }
        return [
            //
            'id_cate' => 1,
            'id_brands' => 1,
            'name' => fake()->name(),
            'amount' => 20,
            'image' => json_encode($image),
            'old_price' => 99000,
            'sale_price' => 55000,
            'status' => 1
        ];
    }
}
