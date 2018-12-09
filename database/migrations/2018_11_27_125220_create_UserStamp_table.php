<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStampTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stamps', function (Blueprint $table) {
			$table->increments('id');
			$table->datetime('start_time');
			$table->datetime('end_time');
			$table->integer('pause')->nullable();
			$table->boolean('approved');
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
        Schema::drop('UserStamp');
    }
}
