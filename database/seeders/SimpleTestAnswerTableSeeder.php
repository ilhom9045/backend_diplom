<?php

namespace Database\Seeders;

use App\Models\v1\SimpleTestAnswer;
use Illuminate\Database\Seeder;

class SimpleTestAnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SimpleTestAnswer::factory()->count(100)->create();
    }
}
