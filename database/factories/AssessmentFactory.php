<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssessmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\UserProfile::factory(),
            'bkg_id'  => \App\Models\Booking::factory(),
            'value'   => $this->faker->numberBetween(1,10),
        ];
    }
}
