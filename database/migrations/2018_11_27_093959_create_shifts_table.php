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
            $table->date('date');
            $table->integer('break');
            $table->boolean('tradeable');
            $table->date('startTime');
            $table->date('endTime');
            $table->integer('FK_User');
            $table->integer('FK_CompanyDepartment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *c
     * @return void
     */
    public function down()
    {
        Schema::drop('shifts');
    }
}
