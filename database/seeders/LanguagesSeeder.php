<?php

namespace Database\Seeders;

use App\Models\v1\Languages;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Languages::factory()->count(3)->create();
    }
}
