<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplypementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applypements', function (Blueprint $table) {

          $table->increments('payment_id'); 
          $table->string('apply_id');      
          $table->string('apply_exam_id');
          $table->string('payment_method');
          $table->string('tax_id');
          $table->string('payment_date');
          $table->integer('payment_status')->default('0');
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
        Schema::dropIfExists('applypements');
    }
}
