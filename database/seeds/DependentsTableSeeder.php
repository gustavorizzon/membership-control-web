<?php

use Illuminate\Database\Seeder;

class DependentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dependent::class, 50)->create();
    }
}
