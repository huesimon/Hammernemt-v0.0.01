<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = Faker::create('App/User');

		for ($i=0; $i < 100; $i++) { 
			 DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
			'active' => 1,
			'CompanyId' => random_int(1,3),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'userroleid' => random_int(1,3)
		]);
		}
		 
		
    }
}
