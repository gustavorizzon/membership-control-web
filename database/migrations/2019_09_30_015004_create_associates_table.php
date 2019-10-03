<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssociatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone_number');
            $table->date('birth_date');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('drivers_license')->unique()->nullable();
            $table->string('social_security_number')->unique();
            $table->uuid('barcode_identifier')->unique();
            $table->boolean('is_holder')->default(false);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('associates');
    }
}
