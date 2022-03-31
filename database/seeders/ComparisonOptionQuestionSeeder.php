<?php

namespace Database\Seeders;

use App\Models\v1\ComparisonOptionQuestion;
use Illuminate\Database\Seeder;

class ComparisonOptionQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ComparisonOptionQuestion::factory()->count(500)->create();
    }
}
