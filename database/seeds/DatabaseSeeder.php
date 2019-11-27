<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AssociatesTableSeeder::class);
        
        $this->call(PlaceTypesTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        
        $this->call(AttractionTypesTableSeeder::class);
        $this->call(AttractionsTableSeeder::class);

        $this->call(ReservationsTableSeeder::class);
        $this->call(ReservationGuestsTableSeeder::class);
        
        $this->call(EventsTableSeeder::class);
        $this->call(TicketTypesTableSeeder::class);
    }
}
