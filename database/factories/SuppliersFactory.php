<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suppliers>
 */
class SuppliersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'contact_person' => $this->faker->name,
            'contact_address' => $this->faker->address,
            'contact_phone' => $this->faker->phoneNumber,
            'contact_email' => $this->faker->email,
        ];
    }
}
