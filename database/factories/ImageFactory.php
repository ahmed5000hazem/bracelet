<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $materials = ['satan', 'beads', 'melton', 'jeans', 'fabric', 'bolester'];
        return [
            'material' => $materials[rand(0, count($materials))]
        ];
    }
}
