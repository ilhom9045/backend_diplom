<?php

namespace Database\Seeders;

use App\Models\v1\TestType;
use Illuminate\Database\Seeder;

class TestTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TestType::factory()
            ->count(4)
            ->create();
    }
}
