<?php

namespace Database\Seeders;

use App\Models\v1\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Status::factory()->count(3)->create();
    }
}
