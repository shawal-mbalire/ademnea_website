<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatedHiveTemperaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::dropIfExists('hive_temperatures');

    Schema::create('hive_temperatures', function (Blueprint $table) {
        $table->id();
        $table->string('record');
        $table->unsignedBigInteger('hive_id');
        
        $table->foreign('hive_id')
            ->references('id')
            ->on('hives')
            ->onDelete(null)
            ->nullable();

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
        Schema::dropIfExists('hive_temperatures');
    }
    
}
