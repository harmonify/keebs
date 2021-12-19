<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'name' => $this->faker->unique()->safeColorName(),
            'description' => $this->faker->text(),
            'stock' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->randomNumber(7, true),
            'image' => 'images/default_product_img.jpg',
        ];
    }
}
