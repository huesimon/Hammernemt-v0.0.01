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
			 DB::table('Users')->insert([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
			'active' => 1,
			'company_id' => random_int(1,3),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'user_role_id' => random_int(1,3)
		]);
		}
		 
		
    }
}
