<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibarybookfinetakesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libarybookfinetakes', function (Blueprint $table) {
           $table->increments('libarybook_fine_taka_id');
           $table->string('fine_stu_take_libary_book_id');
           $table->string('stu_fine_libary_book_id');
           $table->string('stu_fine_libary_student_id');
           $table->string('stu_fine_libary_book_roll');
           $table->string('stu_fine_libary_book_department');
           $table->string('stu_fine_libary_book_level');
           $table->string('stu_fine_libary_book_money');
           $table->string('stu_fine_libary_book_total_day');
           
          $table->string('stu_fine_libary_book_take_date');
          $table->string('stu_fine_libary_book_return_date');
          $table->string('libarybook_fine_taka_date');
          $table->integer('libarybook_fine_taka_status')->default('1');
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
        Schema::dropIfExists('libarybookfinetakes');
    }
}
