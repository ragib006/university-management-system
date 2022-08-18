<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addstudents', function (Blueprint $table) {
          $table->increments('student_id');
          $table->integer('student_department_id');
          $table->integer('student_level_id');
          $table->integer('student_batch_id');

          
          $table->integer('student_hallroom_id');
          //$table->integer('student_bus_id');
          $table->string('student_name');
          $table->string('student_roll');
          $table->string('student_email');
          $table->string('student_address');
          $table->string('student_district');
          $table->string('student_mobile_number');
          $table->string('student_father_name');
          $table->string('student_mother_name');
          $table->string('student_father_mobile_number');
          $table->string('student_mother_mobile_number');
          $table->string('student_image');
          $table->string('student_description');
          $table->string('student_password');
          $table->string('student_added_date');
          $table->integer('student_status')->default('1');
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
        Schema::dropIfExists('addstudents');
    }
}
