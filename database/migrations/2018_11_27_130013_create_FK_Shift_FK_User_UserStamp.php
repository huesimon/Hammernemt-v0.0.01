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
			$table->unsignedInteger('shift_id');
			$table->unsignedInteger('user_id');
			$table->foreign('shift_id')->references('id')->on('Shifts');
			$table->foreign('user_id')->references('id')->on('Users');
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
