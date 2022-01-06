<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { $starts_at = Carbon::createFromTimestamp($this->faker->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week')->getTimeStamp());
        return [
            'plc_id'  => \App\Models\Place::factory(),
            'user_id' => \App\Models\UserProfile::factory(),
            'start_date' => Carbon::createFromTimestamp($this->faker->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week')->getTimeStamp()),
            'end_date' => Carbon::createFromFormat('Y-m-d H:i:s', $starts_at)->addHours( $this->faker->numberBetween( 1, 8 ) ),
            'status' => 'pending',
            'payment_plan' => 'hours',
            'cost' => $this->faker->numberBetween(10,70),
        ];
    }
}
