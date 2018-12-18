<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftTradesTable extends Migration
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
			$table->integer('original_owner_id')->nullable();
			$table->integer('new_owner_id')->nullable();
			$table->boolean('approved')->default(0);
			$table->text('comment')->nullable();
			$table->boolean('active')->default(1);
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
        Schema::dropIfExists('shift_trades');
    }
}
