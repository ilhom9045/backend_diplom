<?php

namespace Database\Factories\v1;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_name' => $this->faker->creditCardType,
        ];
    }
}
