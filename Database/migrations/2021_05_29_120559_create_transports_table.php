<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
          $table->increments('bus_id');
          $table->string('bus_number');
          $table->string('bus_name');
          $table->string('bus_sit_number');
          $table->string('bus_fee');
          $table->string('bus_route');
          $table->string('bus_added_date');
          $table->integer('bus_status')->default('1');
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
        Schema::dropIfExists('transports');
    }
}
