<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBarcodeIdentifierFromAssociatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('associates', function (Blueprint $table) {
            $table->dropColumn('barcode_identifier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('associates', function (Blueprint $table) {
            $table->uuid('barcode_identifier')->unique();
        });
    }
}
