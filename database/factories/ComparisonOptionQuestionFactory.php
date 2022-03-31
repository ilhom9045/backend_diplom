<?php

namespace Database\Factories;

use App\Models\v1\ComparisonOptionAnswer;
use App\Models\v1\ComparisonTest;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComparisonOptionQuestionFactory extends Factory
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
            'comparison_test_id' => ComparisonTest::all()->random(),
            'question_body' => $this->faker->text,
            'comparison_option_answer_id' => ComparisonOptionAnswer::all()->random()
        ];
    }
}
