<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFKUserroleForUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('users', function (Blueprint $table) {
			$table->unsignedInteger('userroleid');
		
			$table->foreign('userRoleId')->references('id')->on('userrole');
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
