<?php

namespace Database\Seeders;

use App\Models\v1\ComparisonTest;
use Illuminate\Database\Seeder;

class ComparisonTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ComparisonTest::factory()->count(100)->create();
    }
}
