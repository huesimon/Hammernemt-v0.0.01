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
        Schema::create('shift_trades', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('shift_id');
			$table->integer('original_owner_id');
			$table->integer('new_owner_id');
			$table->boolean('approved');
			$table->text('comment');
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
