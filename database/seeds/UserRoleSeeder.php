<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 3; $i++) { 
			DB::table('user_roles')->insert([
			'type' => 'RoleType' . $i,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);
		}
    }
}
