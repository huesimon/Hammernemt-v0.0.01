<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('date');
            $table->timestamp('break');
            $table->boolean('tradeable');
            $table->timestamp('startTime');
            $table->timestamp('endTime');
            $table->integer('FK_User');
            $table->integer('FK_CompanyDepartment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shifts');
    }
}
