<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddcourseattentdancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addcourseattentdances', function (Blueprint $table) {
          $table->increments('course_atten_id');
          $table->int('course_attent_studentid');
          $table->int('course_attent_course_id');
          $table->int('course_attent_dpt_id');
          $table->int('course_attent_level_id');
          
       
          $table->string('course_attent_date');
          $table->string('course_attent_year');
          $table->string('course_attent_month');
          $table->string('course_attent_pre_or_abs');
          // $table->string('mark_added_date');
          $table->integer('course_attent_status')->default('1');
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
        Schema::dropIfExists('addcourseattentdances');
    }
}
