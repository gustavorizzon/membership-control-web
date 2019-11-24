<?php

use Illuminate\Database\Seeder;

class AssociatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Associate::class, 100)->create();
    }
}
