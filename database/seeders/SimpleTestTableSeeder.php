<?php

namespace Database\Seeders;

use App\Models\v1\SimpleTest;
use Illuminate\Database\Seeder;

class SimpleTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SimpleTest::factory()->count(2000)->create();
    }
}
