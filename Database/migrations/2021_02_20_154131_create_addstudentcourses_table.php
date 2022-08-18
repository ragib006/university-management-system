<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddstudentcoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addstudentcourses', function (Blueprint $table) {
          $table->increments('addstuent_courseid');

          $table->integer('semester_courseid');
          $table->integer('course_level_id');
          $table->integer('course_stu_id');

          
          
          $table->string('stuentcourseadded_date');
          $table->integer('studentcourse_status')->default('1');
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
        Schema::dropIfExists('addstudentcourses');
    }
}
