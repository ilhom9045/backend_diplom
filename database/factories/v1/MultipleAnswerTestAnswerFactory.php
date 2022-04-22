<?php

namespace Database\Factories\v1;

use App\Models\v1\MultipleAnswerTest;
use Illuminate\Database\Eloquent\Factories\Factory;

class MultipleAnswerTestAnswerFactory extends Factory
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
            'multiple_answer_test_id' => MultipleAnswerTest::all()->random(),
            'answer_body' => $this->faker->text,
            'is_true' => $this->faker->boolean,
        ];
    }
}
