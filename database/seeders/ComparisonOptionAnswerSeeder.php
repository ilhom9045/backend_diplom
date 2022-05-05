<?php

namespace Database\Seeders;

use App\Models\v1\ComparisonOptionAnswer;
use Illuminate\Database\Seeder;

class ComparisonOptionAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ComparisonOptionAnswer::factory()->count(600)->create();
    }
}
