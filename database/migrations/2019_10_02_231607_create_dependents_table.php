<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependents', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Holder Reference
            $table->bigInteger('holder_id')->unsigned();
            $table->foreign('holder_id')->references('id')->on('associates');

            // Dependent Reference
            $table->bigInteger('dependent_id')->unsigned();
            $table->foreign('dependent_id')->references('id')->on('associates');
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
        Schema::dropIfExists('dependents');
    }
}
