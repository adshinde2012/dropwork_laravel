<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('st_id');
            $table->integer('roll_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->integer('course_id')->unsigned();
            $table->integer('semester_id')->unsigned();
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
        Schema::dropIfExists('students');
    }
}
