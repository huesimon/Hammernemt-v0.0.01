<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserStampsTable extends Migration
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
            $table->datetime('end_time')->nullable();
            $table->datetime('original_start_time');
			$table->datetime('original_end_time')->nullable();
			$table->integer('pause')->default(30);
			$table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
			$table->boolean('edited')->default(0);
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
        Schema::dropIfExists('user_stamps');
    }
}
