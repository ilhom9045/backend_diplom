<?php

namespace Database\Factories\v1;

use App\Models\v1\Status;
use App\Models\v1\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

class MultipleAnswerTestFactory extends Factory
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
            'title' => $this->faker->title,
            'status_id' => Status::all()->random(),
            'subject_id' => Subjects::all()->random(),
        ];
    }
}
