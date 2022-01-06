<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'     => $this->faker->sentence,
            'plc_type'  => $this->faker->slug,
            'price'     => $this->faker->numberBetween(25, 50),
            'description'  => $this->faker->paragraph,
            'status' => 'available',
            'capacity'  => $this->faker->numberBetween(1, 100),
        ];
    }
}
