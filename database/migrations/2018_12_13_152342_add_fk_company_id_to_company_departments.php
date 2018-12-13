<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCompanyIdToCompanyDepartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_departments', function (Blueprint $table) {
			$table->unsignedInteger('company_id');
			$table->foreign('company_id')->references('id')->on('companies')->nullable()->default(null);
		
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_departments', function (Blueprint $table) {
            //
        });
    }
}
