<?php

use Illuminate\Database\Seeder;

class PlaceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PlaceType::class, 15)->create();
    }
}
