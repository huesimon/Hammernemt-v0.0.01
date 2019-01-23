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
            $randonStatus = random_int(0,2);
            if($randonStatus == 0){
                $status = 'pending';
            }elseif ($randonStatus == 1){
                $status = 'approved';
            }elseif ($randonStatus == 2){
                $status = 'rejected';
            }
			DB::table('user_stamps')->insert([
				'start_time' => $startTime,
				'end_time' => $endTime,
				'pause' => 15,
				'status' => $status,
				'shift_id' => random_int(104,194),
				'user_id' => random_int(1, 100),
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
                'original_start_time'=> $startTime,
                'original_end_time'=>$endTime
			]);
		}
    }
}
