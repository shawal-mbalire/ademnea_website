<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatedHiveHumidityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hive_humidity', function (Blueprint $table) {
            $table->string('record', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
    */
    public function down()
    {
        Schema::table('hive_humidity', function (Blueprint $table) 
        {
        $table->float('record')->change();
        });
    }
}