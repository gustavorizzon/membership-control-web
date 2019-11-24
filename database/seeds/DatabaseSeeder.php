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
        
        $this->call(TicketTypesTableSeeder::class);
        $this->call(PlaceTypesTableSeeder::class);
        $this->call(AttractionTypesTableSeeder::class);

        $this->class(AttractionsTableSeeder::class);
    }
}
