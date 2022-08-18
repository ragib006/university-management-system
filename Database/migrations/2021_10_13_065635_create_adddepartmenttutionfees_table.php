<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdddepartmenttutionfeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adddepartmenttutionfees', function (Blueprint $table) {
          $table->increments('department_tution_fee_id');
          $table->string('dep_tutionfee_dep_id');
          $table->string('dep_tutionfee_level_id');
          $table->string('department_tution_fee_amount');
          $table->string('department_tution_fee_type');
          $table->string('department_tution_fee_added_date');
          $table->string('department_tution_fee_last_date');
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
        Schema::dropIfExists('adddepartmenttutionfees');
    }
}
