<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('sub_id');
            $table->string('sub_name');
            $table->integer('credit');
            $table->integer('course_id')->unsigned();
            $table->integer('semester_id')->unsigned();
            $table->integer('assign_teacher_id')->unsigned();
            $table->foreign('course_id')->references('c_id')->on('courses')->onDelete('cascade');
            $table->foreign('semester_id')->references('sem_id')->on('semesters')->onDelete('cascade');
            $table->foreign('assign_teacher_id')->references('t_id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
