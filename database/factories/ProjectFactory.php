<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(50),
            'description' => fake()->realText(150),
            'launch_date' => $this->faker->optional()->dateTimeBetween('-3 years', 'now'),
            'website_url' => fake()->url(),
            'client_id' => Client::factory()
        ];
    }
}
