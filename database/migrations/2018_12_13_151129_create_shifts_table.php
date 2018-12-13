<?php

use Illuminate\Support\Facades\Schema;
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
			$table->datetime('date');
            $table->integer('break')->nullable();
            $table->boolean('tradeable');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('user_id');
            $table->integer('company_department_id')->nullable();
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
        Schema::dropIfExists('shifts');
    }
}
