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
        Schema::table('userstamp', function (Blueprint $table) {
			$table->unsignedInteger('shift_id');
			$table->unsignedInteger('user_id');
			$table->foreign('shift_id')->references('id')->on('shifts');
			$table->foreign('user_id')->references('id')->on('users');
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
