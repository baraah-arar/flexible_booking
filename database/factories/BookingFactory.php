<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plc_id'  => \App\Models\Place::factory(),
            'user_id' => \App\Models\UserProfile::factory(),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'status' => 'pending',
            'payment_plan' => 'hours',
            'cost' => $this->faker->numberBetween(10,70),
        ];
    }
}
