<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Space>
 */
class SpaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'type' => $this->faker->randomElement(['meeting', 'birthday', 'wedding', 'other']),
            'address' => $this->faker->streetAddress(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'capacity' => $this->faker->randomElement([10, 30, 50, 100, 200, 500]),
            'images' => ['placeholder.jpg'],
        ];
    }
}
