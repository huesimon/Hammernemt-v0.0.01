<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ShiftPastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		for ($i=1; $i <= 100; $i++) { 
			$random = random_int(1,30);
			$shiftDay = Carbon::now()->addDays(-$random);
			$endtime = Carbon::now()->addDays($random)->addHours(3);
			DB::table('Shifts')->insert([
				'date' => $shiftDay,
				'tradeable' => 0,
				'startTime' => $shiftDay,
				'endTime' => $endtime,
				'FK_User' => random_int(1,40),
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			]);
		}
    }
}
