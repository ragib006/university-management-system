<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
          $table->increments('course_id');
          //$table->integer('sem_id');
          $table->integer('lev_id');
          $table->integer('dept_id');
          $table->integer('tec_id');
          $table->integer('cls_room_id');
          $table->string('course_code');
          $table->string('course_title');
          $table->string('course_credit');
          $table->string('course_type');
          $table->string('course_class_number');

          
       
          $table->string('course_added_date');
          $table->integer('course_added_status')->default('1');
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
        Schema::dropIfExists('courses');
    }
}
