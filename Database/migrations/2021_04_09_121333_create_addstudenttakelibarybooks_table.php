<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddstudenttakelibarybooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addstudenttakelibarybooks', function (Blueprint $table) {
          $table->increments('studenttake_libary_book_id');
          $table->string('studenttake_libary_book_roll');
          $table->string('libary_book_my_id');
          $table->string('studenttake_libary_book_department');
          $table->string('studenttake_libary_book_level');
          $table->string('studenttake_libary_book_take_date');
          $table->string('studenttake_libary_book_return_date');
          $table->integer('studenttake_libary_book_status')->default('1');
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
        Schema::dropIfExists('addstudenttakelibarybooks');
    }
}
