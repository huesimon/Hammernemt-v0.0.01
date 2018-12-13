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
		//$startTime = $today->format('H:mm:ss');
		//$endTime = $today->addHours(3)->format('H:mm:ss');


        for ($i=1; $i <= 90; $i++) {
            $random = random_int(-30,-1);
            $random_start = random_int(-10,10);
            $random_end = random_int(-10,10);
            $startTime = Carbon::now()->addDays($random)->addMinutes($random_start);
            $endTime = Carbon::now()->addDays($random)->addHours(3)->addMinutes($random_end);
			DB::table('user_stamps')->insert([
				'start_time' => $startTime,
				'end_time' => $endTime,
				'pause' => 15,
				'approved' => random_int(0,1),
				'shift_id' => random_int(104,194),
				'user_id' => random_int(1, 100),
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		}
    }
}
