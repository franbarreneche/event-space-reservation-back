<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateFrom = \Carbon\Carbon::parse($this->faker->dateTimeThisMonth());
        $dateTo = \Carbon\Carbon::createFromDate($dateFrom)->addHours($this->faker->numberBetween(1,5));

        return [
            'event_name' => $this->faker->name(),
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
        ];
    }
}
