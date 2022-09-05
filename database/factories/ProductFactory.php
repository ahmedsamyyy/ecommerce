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
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'slug' => $this->faker->name(),
            'price' => 10,
            'qty' => 10,
            'manage_stock' => $this->faker->boolean(),
            'in_stock' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
