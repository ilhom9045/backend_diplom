<?php

namespace Database\Factories\v1;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
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
            'status_name'=>$this->faker->title
        ];
    }
}
