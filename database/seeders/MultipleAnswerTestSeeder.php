<?php

namespace Database\Seeders;

use App\Models\v1\MultipleAnswerTest;
use Illuminate\Database\Seeder;

class MultipleAnswerTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MultipleAnswerTest::factory()->count(100)->create();
    }
}
