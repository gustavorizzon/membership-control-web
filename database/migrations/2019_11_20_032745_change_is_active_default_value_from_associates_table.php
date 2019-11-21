<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeIsActiveDefaultValueFromAssociatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('associates', function (Blueprint $table) {
            $table->boolean('is_active')->default(false)->change();
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
            $table->boolean('is_active')->default(true);
        });
    }
}
