<?php

namespace Database\Factories\v1;

use App\Models\v1\Status;
use App\Models\v1\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComparisonTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->title,
            'status_id' => Status::all()->random(),
            'subject_id' => Subjects::all()->random(),
        ];
    }
}
