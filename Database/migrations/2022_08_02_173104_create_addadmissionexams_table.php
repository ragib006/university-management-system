<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddadmissionexamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addadmissionexams', function (Blueprint $table) {
            
          $table->increments('admissionexam_id');
          $table->string('admissionexam_name');
          $table->string('admission_test_date');
          $table->string('admission_applying_last_date');
          $table->string('admission_exam_mark');
          $table->string('admission_test_year');
          $table->integer('admission_exam_status')->default('1');

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
        Schema::dropIfExists('addadmissionexams');
    }
}
