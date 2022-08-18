<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmissionappliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissionapplies', function (Blueprint $table) {
          

          $table->increments('apply_student_id');
          $table->string('admission_exam_id');
          $table->string('apply_student_name');
          $table->string('apply_student_email');
          $table->string('apply_student_password');          
          $table->string('apply_student_ssc_pass_year');
          $table->string('apply_student_hsc_pass_year');
          $table->string('apply_student_ssc_roll');
          $table->string('apply_student_hsc_roll');
          $table->string('apply_student_image');

   $table->integer('apply_student_roll');
            
         // $table->string('applying_unit');
          $table->string('apply_student_date');
          $table->string('apply_student_year');

               $table->string('apply_student_payment_type');

              $table->string('apply_payment_tax_id');

        
    

          $table->integer('apply_student_status')->default('1');

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
        Schema::dropIfExists('admissionapplies');
    }
}
