<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitysemesterfinalresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universitysemesterfinalresults', function (Blueprint $table) {

          $table->increments('university_semesterfinal_result_id');
          $table->string('university_semesterfinal_student_id');
          $table->string('university_semesterfinal_department_id');
          $table->string('university_semesterfinal_level_id');
          $table->string('university_semesterfinal_exam_id');
          $table->string('university_semesterfinal_total_course_credit');
          $table->string('university_semesterfinal_total_mark');
          $table->string('university_semesterfinal_student_earn_total');
          $table->string('sumof_total_coursecredit_gun_student_earn_cgpa');
          $table->string('university_semesterfinal_student_cgpa');
          $table->string('university_semesterfinal_mark_addeddate');
          $table->string('university_semesterfinal_mark_status');
          //$table->string('university_semesterfinal_description');      
          $table->string('university_semesterfinal_main_status');      


          $table->integer('university_semesterfinal_publich_status')->default('1');
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
        Schema::dropIfExists('universitysemesterfinalresults');
    }
}
