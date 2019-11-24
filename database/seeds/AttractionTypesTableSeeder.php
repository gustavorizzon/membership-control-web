<?php

use Illuminate\Database\Seeder;

class AttractionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AttractionType::class, 15)->create();
    }
}
