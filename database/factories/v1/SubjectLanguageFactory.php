<?php

namespace Database\Factories\v1;

use App\Models\v1\Languages;
use App\Models\v1\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectLanguageFactory extends Factory
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
            'subject_id' => Subjects::all()->random(),
            'language_id' => Languages::all()->random()
        ];
    }
}
