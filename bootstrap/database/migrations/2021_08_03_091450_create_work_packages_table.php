<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('abbreviation')->nullable();
            $table->text('description')->nullable();
            $table->text('task')->nullable();
            $table->text('partners')->nullable();
            $table->text('deliverables')->nullable();
            $table->text('interdependances')->nullable();
            $table->text('potential_innovetions')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('work_packages');
    }
}
