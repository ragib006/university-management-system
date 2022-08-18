<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {

          $table->increments('level_id');
          $table->string('dpt_myid');
          $table->string('level_name');
          $table->string('level_class_room');
          $table->string('tec_id_level_addvisor');
          $table->string('level_dpt_tution_free');
          $table->string('level_added_date');
          $table->string('level_expire_date');       
          $table->integer('level_status')->default('1');

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
        Schema::dropIfExists('levels');
    }
}
