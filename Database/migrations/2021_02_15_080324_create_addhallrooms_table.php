<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddhallroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addhallrooms', function (Blueprint $table) {
          $table->increments('hall_room_id');
          $table->string('myhall_id');
          $table->string('hall_room_name');
          $table->string('hall_room_number');
          $table->string('hall_room_floor');
          $table->string('hall_room_sit_number');
          $table->string('hall_room_sit_fee');
          $table->string('hall_room_added_date');
          $table->integer('hall_room_status')->default('1');
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
        Schema::dropIfExists('addhallrooms');
    }
}
