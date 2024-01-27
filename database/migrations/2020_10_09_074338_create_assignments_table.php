<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('as_id');
            $table->string('title');
            $table->string('description');
            $table->string('file_url');
            $table->integer('points');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->integer('subject_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('semester_id')->unsigned();
            $table->foreign('subject_id')->references('sub_id')->on('subjects')->onDelete('cascade');
            $table->foreign('teacher_id')->references('t_id')->on('teachers')->onDelete('cascade');
            $table->foreign('course_id')->references('c_id')->on('courses')->onDelete('cascade');
            $table->foreign('semester_id')->references('sem_id')->on('semesters')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
