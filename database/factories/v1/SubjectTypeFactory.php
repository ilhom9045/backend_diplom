<?php

namespace Database\Factories\v1;

use App\Models\v1\Subjects;
use App\Models\v1\TestType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject_id' => Subjects::all()->random(),
            'test_type_id' => TestType::all()->random()
        ];
    }
}
