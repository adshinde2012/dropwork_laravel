<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions', function (Blueprint $table) {
            $table->increments('sol_id');
            $table->integer('student_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('que_ass_id')->unsigned();
            $table->string('ans_url');
            $table->dateTime('submit_date');
            $table->integer('marks')->nullable();
            $table->boolean('status')->default(false);
        
            $table->foreign('student_id')->references('st_id')->on('students')->onDelete('cascade');
            $table->foreign('subject_id')->references('sub_id')->on('subjects')->onDelete('cascade');
            $table->foreign('que_ass_id')->references('as_id')->on('assignments')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solutions');
    }
}
