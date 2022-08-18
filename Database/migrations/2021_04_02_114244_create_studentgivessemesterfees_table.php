<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentgivessemesterfeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentgivessemesterfees', function (Blueprint $table) {
          $table->increments('student_givesemesterfee_id');
          $table->string('student_givesemesterfee_studentroll');
          $table->string('student_givesemesterfee_stuentlevel');
          $table->string('student_givesemesterfee_stuentdepartment');
          $table->string('main_semester_fee');
          $table->string('student_givesemesterfee_amount');
          $table->string('student_givesemesterfee_fine');
          $table->string('student_givesemesterfee_fine_plus_total_amount');
          $table->string('student_givesemesterfee_extra_money');
          $table->string('student_givesemesterfee_loss_blance');
          $table->string('student_givesemesterfee_added_date');
          $table->string('student_givesemesterfee_expire_date');
          $table->string('fine_duration');

          $table->integer('student_givesemesterfee_status')->default('1');
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
        Schema::dropIfExists('studentgivessemesterfees');
    }
}
