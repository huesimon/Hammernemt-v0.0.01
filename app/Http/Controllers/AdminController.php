<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftTrade;
use App\Shift;
use App\User;
class AdminController extends Controller
{
	public function tradeList()
    {
		$shiftTrades = ShiftTrade::waitingApproval()->get();
		return view('admin.tradelist.approval', compact('shiftTrades'));
	}
	public function acceptTrade($shiftTradeId) {
		$shiftTrade = ShiftTrade::find($shiftTradeId);
		$shift = Shift::find($shiftTrade->shift_id);
		//Change the shift user_id to the new owner from shiftTrade
		$shift->user_id = $shiftTrade->new_owner_id;
		$shift->save();
		//Set the ShiftTrade to approved
		$shiftTrade->approved = 1;
		$shiftTrade->save();
		session()->flash('message', 'Du har nu accepteret byttet mellem ' . ' INDSÆT NANV'  . ' og ' . 'INDSÆT NAVN2');
		return redirect()->route('adminTradeList');
	}
	
	public function declineTrade($shiftTradeId) {
		$shiftTrade = ShiftTrade::find($shiftTradeId);
		$originalOwner = User::find($shiftTrade->original_owner_id);
		$newOwner = User::find($shiftTrade->new_owner_id);
		$shiftTrade->new_owner_id = null;
		$shiftTrade->save();
		session()->flash('message', 'Du har nu AFVIST byttet mellem ' . $originalOwner->name . ' og ' . $newOwner->name);
		return redirect()->back();
	}

	public function createShiftView() {
		$users = User::all();
		return view('admin.shift.create', compact('users'));
	}

	public function createShift(Request $request) {
		// dd($request->input());
		$userId = $request->input('inputUserId');
		$startDate = $request->input('inputStartDate');
		$endDate = $request->input('inputEndDate');
		$startTime = $request->input('inputStartTime');
		$endTime = $request->input('inputEndTime');
		
		$days = [
			'Monday' => $request->input('checkboxMonday'),
			'Tuesday' => $request->input('checkboxTuesday'),
			'Wednesday' => $request->input('checkboxWednesday'),
			'Thursday' => $request->input('checkboxThursday'),
			'Friday' => $request->input('checkboxFriday'),
			'Saturday' => $request->input('checkboxSaturday'),
			'Sunday' => $request->input('checkboxSunday'),
		];
		
		//$this->createShiftInterval($startDate, $startTime, $endTime, $endDate, $days);
		$shift = new Shift;
		if (is_null($userId)) {
			$shift->user_id = null;
			$shift->tradeable = 1;
			$shift->date = $startDate . ' ' .  $startTime;
			$shift->start_time = $startDate . ' ' .  $startTime;
			$shift->end_time = $endDate . ' ' .  $endTime;
			$shift->save();

			$shiftTrade = new ShiftTrade;
			$shiftTrade->shift_id = $shift->id;
			$shiftTrade->save();
		}else {
			$shift->user_id = $userId;
			$shift->date = $startDate . ' ' .  $startTime;
			$shift->start_time = $startDate . ' ' .  $startTime;
			$shift->end_time = $endDate . ' ' .  $endTime;
			$shift->save();
		}
		
		session()->flash('message', 'Vagt oprettet');
		return redirect()->back();
		}

		/**
	 	* Create shifts within a given interval
		* @param start $start of the interval
		* @param end $end of the interval
		* @param days $days array of days null or 1
		*
		* @return void
		*/
		public function createShiftInterval($intervalStart, $shiftStartTime, $shiftEndTime, $intervalEnd, $days) {
			//TODO: need to create shifts
			$begin = \Carbon\Carbon::parse($intervalStart);
			$end = \Carbon\Carbon::parse($intervalEnd);
			$test = \Carbon\CarbonPeriod::create('2018-12-18', '2019-02-01');
			$validDays = [];
			$validDays = array_keys($days, 1);
			$dates = [];
			foreach ($test as $date) {
				if(in_array($date->format('l'), $validDays  ))
				$dates[] = $date;
			}

		}

}
