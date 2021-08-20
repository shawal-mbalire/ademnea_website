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
            $table->string('name');
            $table->$table->bigInteger('task_id')->nullable();
            $table->$table->bigInteger('number')->unsigned;
            $table->string('partners');
            $table->string('duration');
            $table->string('description');
            $table->string('potential_innovetions');
            $table->string('deliverables');
            $table->string('interdependances');
            $table->string('resource_requirements');
            $table->timestamps();
            $table->foreign('task_id')->references('id')->on('work_packages')->onDelete('cascade');
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
