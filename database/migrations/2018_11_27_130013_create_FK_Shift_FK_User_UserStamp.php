<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKShiftFKUserUserStamp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('UserStamp', function (Blueprint $table) {
			$table->unsignedInteger('ShiftId');
			$table->unsignedInteger('UserId');
			$table->foreign('ShiftId')->references('id')->on('Shifts');
			$table->foreign('UserId')->references('id')->on('Users');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
