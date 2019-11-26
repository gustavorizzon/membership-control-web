<?php

use Illuminate\Database\Seeder;

class ReservationGuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ReservationGuest::class, 500)->create();
    }
}
