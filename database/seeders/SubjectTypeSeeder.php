<?php

namespace Database\Seeders;

use App\Models\v1\SubjectType;
use Illuminate\Database\Seeder;

class SubjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubjectType::factory()->count(40)->create();
    }
}
