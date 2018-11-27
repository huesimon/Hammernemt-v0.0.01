<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UserStampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$today = Carbon::now();
		//Needs fix, database is DATE... format as time
		$startTime = $today->format('h:m:s');
		$endTime = $today->addHours(3)->format('h:m:s');
		for ($i=1; $i <= 90; $i++) { 
			DB::table('UserStamp')->insert([
				'startTime' => $startTime,
				'endTime' => $endTime,
				'pause' => 15,
				'approved' => random_int(0,1),
				'ShiftId' => random_int(104,194),
				'UserId' => random_int(1, 100),
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		}
    }
}
