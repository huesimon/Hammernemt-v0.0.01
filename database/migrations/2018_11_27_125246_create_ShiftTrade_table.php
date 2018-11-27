<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftTradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ShiftTrade', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('originalOwner');
			$table->integer('newOwner');
			$table->boolean('approved');
			$table->boolean('active');
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
        Schema::drop('ShiftTrade');
    }
}
