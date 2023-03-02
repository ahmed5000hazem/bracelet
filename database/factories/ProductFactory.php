<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => Str::random(10),
            'user_id' => rand(1, 500),
            'description' => fake()->text(),
            'category_id' => rand(1, 10),
            'qty' => rand(0, 50),
            'price' => rand(10, 700),
            'discount' => 0,
            'hidden' => rand(0, 1)
        ];
    }
}
