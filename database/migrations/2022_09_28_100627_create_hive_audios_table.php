-- Active: 1663688201361@@127.0.0.1@3306@ademnea_website

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHiveAudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hive_audios', function (Blueprint $table) {
            
            $table->id();
            $table->string('path');
            $table->unsignedBigInteger('hive_id');

            $table->foreign('hive_id')
                  ->references('id')->on('hives')
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
        Schema::dropIfExists('hive_audios');
    }
}
