<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesemesterfinalmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursesemesterfinalmarks', function (Blueprint $table) {
          $table->increments('semesterfinal_id');
          $table->string('semester_final_student_id');
          $table->string('semester_final_course_id');
          $table->string('semester_final_level_id');
          $table->string('semester_final_department_id');


          $table->string('semester_final_exam_id');



          $table->string('semester_final_course_credit');

          


          $table->string('semester_final_ct_mark');
          $table->string('semester_final_attentdance_mark');
          $table->string('semester_final_exam_mark');
          $table->string('semester_final_total_course_mark');
          $table->string('semester_final_course_grade');
          $table->string('semester_final_course_cgpa');
          $table->string('semester_final_coursecredit_gun_course_cgpa');
          $table->string('semester_final_added_date');
          
          
          $table->integer('semester_final_publich_status')->default('1');
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
        Schema::dropIfExists('coursesemesterfinalmarks');
    }
}
