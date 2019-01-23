<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
		// create simon user
		DB::table('users')->insert([
		'name' => 'Simon Rasmussen',
		'email' => 'simon@simon.dk',
		'active' => 1,
		'company_id' => random_int(1,3),
		'department_id' => random_int(1,3),
		'password' => Hash::make('password'),
		'phone' => 88888888,
		'created_at' => Carbon::now(),
		'updated_at' => Carbon::now(),
		'user_role_id' => random_int(1,3)
		]);

		// create jonas user
		DB::table('users')->insert([
			'name' => 'Jonas bauch',
			'email' => 'jonas@jonas.dk',
			'active' => 1,
			'company_id' => random_int(1,3),
			'department_id' => random_int(1,3),
			'password' => Hash::make('password'),
			'phone' => 88888888,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'user_role_id' => random_int(1,3)
		]);

		// create anders user
		DB::table('users')->insert([
			'name' => 'Anders Callesen',
			'email' => 'anders@anders.dk',
			'active' => 1,
			'company_id' => random_int(1,3),
			'department_id' => random_int(1,3),
			'password' => Hash::make('password'),
			'phone' => 88888888,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'user_role_id' => random_int(1,3)
		]);
		// create andrás user
		DB::table('users')->insert([
			'name' => 'András Ács',
			'email' => 'anac@hammernemt.dk',
			'active' => 1,
			'company_id' => random_int(1,3),
			'department_id' => random_int(1,3),
			'password' => Hash::make('anac1234'),
			'phone' => 88888888,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'user_role_id' => random_int(1,3)
		]);
		// create karsten user
		DB::table('users')->insert([
			'name' => 'Karsten Vandrup',
			'email' => 'kava@hammernemt.dk',
			'active' => 1,
			'company_id' => random_int(1,3),
			'department_id' => random_int(1,3),
			'password' => Hash::make('kava1234'),
			'phone' => 88888888,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'user_role_id' => random_int(1,3)
		]);
		// create censor user
		DB::table('users')->insert([
			'name' => 'Censor Censorsen',
			'email' => 'censor@hammernemt.dk',
			'active' => 1,
			'company_id' => random_int(1,3),
			'department_id' => random_int(1,3),
			'password' => Hash::make('censor1234'),
			'phone' => 88888888,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'user_role_id' => random_int(1,3)
		]);
		for ($i=0; $i < 100; $i++) { 
			 DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
			'active' => 1,
			'company_id' => random_int(1,3),
			'department_id' => random_int(1,3),
			'password' => Hash::make('password'),
			'phone' => 88888888,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'user_role_id' => random_int(1,3)
		]);
		}
		 
		
    }
}
