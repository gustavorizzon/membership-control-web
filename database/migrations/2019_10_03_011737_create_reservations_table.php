<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->timestamp('from');
            $table->timestamp('to');

            // Place Reference
            $table->bigInteger('place_id');
            $table->foreign('place_id')->references('id')->on('places');

            // Associate Reference -- Reserved To
            $table->bigInteger('reserved_to')->nullable();
            $table->foreign('reserved_to')->references('id')->on('associates');

            // User Reference -- Reserved By
            $table->bigInteger('reserved_by');
            $table->foreign('reserved_by')->references('id')->on('users');

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
        Schema::dropIfExists('reservations');
    }
}
