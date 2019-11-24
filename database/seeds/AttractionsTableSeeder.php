<?php

use Illuminate\Database\Seeder;

class AttractionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Attraction::class, 36)->create();
    }
}
