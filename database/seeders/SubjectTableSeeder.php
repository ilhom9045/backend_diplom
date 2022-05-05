<?php

namespace Database\Seeders;

use App\Models\v1\Subjects;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Subjects::factory()->count(10)->create();
    }
}
