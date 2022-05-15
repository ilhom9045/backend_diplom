<?php

namespace Database\Factories\v1;

use App\Models\v1\Languages;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->text,
            'language_id' => Languages::all()->random(),
        ];
    }
}
