<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('category')->nullable();
            $table->string('task')->nullable();
            $table->string('topic')->nullable();
            $table->text('deliverables')->nullable();
            $table->string('competence')->nullable();
            $table->text('instructions')->nullable();
            $table->integer('positions')->nullable()->unsigned();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarships');
    }
}
