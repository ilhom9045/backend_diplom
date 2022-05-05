<?php

namespace Database\Seeders;

use App\Models\v1\MultipleAnswerTestAnswer;
use Illuminate\Database\Seeder;

class MultipleAnswerTestAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MultipleAnswerTestAnswer::factory()->count(500)->create();
    }
}
