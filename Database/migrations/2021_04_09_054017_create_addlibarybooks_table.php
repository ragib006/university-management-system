<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddlibarybooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addlibarybooks', function (Blueprint $table) {
          $table->increments('libary_book_id');
          $table->string('libary_book_name');
          $table->string('libary_book_department_id');
          $table->string('libary_book_level_id');
          $table->string('libary_book_qty');
          $table->string('libary_book_image');
          $table->string('libary_book_added_date');
          $table->integer('libary_book_status')->default('1');
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
        Schema::dropIfExists('addlibarybooks');
    }
}
