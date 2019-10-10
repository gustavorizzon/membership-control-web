<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->unique();
            $table->text('description');
            
            $table->integer('capacity');
            
            $table->string('latitute');
            $table->string('longitude');

            // Place Type Reference
            $table->integer('place_type_id');
            $table->foreign('place_type_id')->references('id')->on('place_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
