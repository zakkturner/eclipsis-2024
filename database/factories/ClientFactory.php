<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => $this->faker->company,
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'website_url' => $this->faker->optional()->url,
            'budget' => $this->faker->optional()->randomElement(['$1000-$5000', '$5000-$10000', '$10000+']),
            'phone' => $this->faker->optional()->phoneNumber,
            'address' => $this->faker->optional()->address,
            'owner_birthday' => $this->faker->optional()->date('Y-m-d'),
            'twitter' => $this->faker->optional()->userName,
            'linkedin' => $this->faker->optional()->url,
            'instagram' => $this->faker->optional()->userName,
            'notes' => $this->faker->optional()->paragraph,
        ];
    }
}
