<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	 // $this->call(UsersTableSeeder::class);
	 	$this->call(CompaniesSeeder::class);
		$this->call(UserRoleSeeder::class);
		$this->call(CompanyDepartmentSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ShiftSeeder::class);
        $this->call(ShiftPastSeeder::class);
		$this->call(UserStampTableSeeder::class);
	}
}
