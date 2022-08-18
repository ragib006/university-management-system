<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentctmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentctmarks', function (Blueprint $table) {
          $table->increments('ct_id');
          $table->string('ct_student_id');
          $table->string('ct_student_course_id');
          $table->string('ct_student_level_id');
          $table->string('ct_type_name');
          $table->string('ct_mark');
           $table->string('ct_date');
          $table->integer('student_ct_status')->default('1');

          
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
        Schema::dropIfExists('studentctmarks');
    }
}
