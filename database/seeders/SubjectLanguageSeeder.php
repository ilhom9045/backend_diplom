<?php

namespace Database\Seeders;

use App\Models\v1\SubjectLanguage;
use Illuminate\Database\Seeder;

class SubjectLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        SubjectLanguage::factory()->count(200)->create();
    }
}
