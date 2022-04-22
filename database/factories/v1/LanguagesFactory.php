<?php

namespace Database\Factories\v1;

use Illuminate\Database\Eloquent\Factories\Factory;

class LanguagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'language_name' => $this->faker->languageCode
        ];
    }
}
