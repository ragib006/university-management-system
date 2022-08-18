<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionresultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissionresults', function (Blueprint $table) {
            
          $table->increments('admission_result_id'); 
          $table->string('stu_roll');      
          $table->string('stu_exm_id');
          $table->string('stu_exm_mark');
          $table->integer('exam_result_status')->default('0');
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
        Schema::dropIfExists('admissionresults');
    }
}
