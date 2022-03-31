<?php

namespace Database\Factories;

use App\Models\v1\ComparisonTest;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComparisonOptionAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'answer_body' => $this->faker->text,
            'is_true' => $this->faker->boolean,
            'comparison_test_id' => ComparisonTest::all()->random(),
        ];
    }
}
