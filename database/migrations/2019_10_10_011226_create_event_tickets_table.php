<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Ticket Type Reference
            $table->integer('ticket_type_id');
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types');

            // Event Reference
            $table->bigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');

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
        Schema::dropIfExists('event_tickets');
    }
}
