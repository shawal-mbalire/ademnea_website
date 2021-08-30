<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->String('name')->nullable();
            $table->String('team_leader')->nullable();
            $table->String('duration')->nullable();
            $table->longText('description')->nullable()->default('text');
            $table->String('partners')->nullable();
            $table->String('potential_innovations')->nullable();
            $table->longText('deliverables')->nullable()->default('text');
            $table->String('interdependence')->nullable();
            $table->String('resource_requirements')->nullable();
            $table->integer('work_package_id')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
