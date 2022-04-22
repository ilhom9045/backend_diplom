<?php

namespace Database\Factories\v1;

use App\Models\v1\SimpleTest;
use Illuminate\Database\Eloquent\Factories\Factory;

class SimpleTestAnswerFactory extends Factory
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
            'simple_test_id' => SimpleTest::all()->random(),
            'answer_body' => $this->faker->text,
            'is_true' => $this->faker->boolean,
        ];
    }
}
