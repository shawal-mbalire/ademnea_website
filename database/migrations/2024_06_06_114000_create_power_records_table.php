<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePowerRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('hives_id')->constrained()->cascadeOnDelete();
            $table->decimal('batteryvoltage');
            $table->decimal('batterypercentage');
            $table->decimal('solarvoltagelevel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('power_records');
    }
}
