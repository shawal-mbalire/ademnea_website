<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmerFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('farmer_farms', function (Blueprint $table) {
            
            $table->unsignedBigInteger('farmer_id');
            $table->unsignedBigInteger('farm_id');

            $table->foreign('farmer_id')
                  ->references('id')->on('farmers')
                  ->onDelete('cascade');
                  
            $table->foreign('farm_id')
                  ->references('id')->on('farms')
                  ->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
