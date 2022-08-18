<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentmarks', function (Blueprint $table) {
          $table->increments('mark_id');
          $table->string('stud_id');
          $table->string('stud_course_id');
          $table->string('first_ct_mark');
          $table->string('second_ct_mark');
          $table->string('third_ct_mark');
          $table->string('fourth_ct_mark');
          $table->string('final_exem_mark');
          $table->string('mark_added_date');
          $table->integer('mark_status')->default('1');
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
        Schema::dropIfExists('studentmarks');
    }
}
