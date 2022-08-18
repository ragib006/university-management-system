<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addteachers', function (Blueprint $table) {

            $table->increments('teacher_id');
            $table->integer('dep_id');
			$table->integer('proffe_id');			 	 
            $table->string('teacher_name');
			$table->string('teacher_email');
            $table->string('teacher_experience');
            $table->string('teacher_image');
            $table->string('teacher_address');
            $table->string('teacher_district');
			$table->string('teacher_passwoard');
            $table->string('teacher_mobile_number');
            $table->string('teacher_description');
            $table->string('teacher_added_date');
            $table->integer('teacher_status')->default('1');
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
        Schema::dropIfExists('addteachers');
    }
}
