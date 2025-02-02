<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'icon' => $this->faker->optional()->imageUrl(64, 64, 'icon', true, 'Faker'), // Generates a placeholder image URL
            'description' => $this->faker->optional()->sentence,
            'is_visible' => $this->faker->boolean, // Generates true or false
        ];
    }
}
