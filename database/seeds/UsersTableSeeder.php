<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($i=0; $i < 1000; $i++) { 
			 DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
			'active' => 1,
			'userroleid' => random_int(1,3)
		]);
		}
		 
		
    }
}
