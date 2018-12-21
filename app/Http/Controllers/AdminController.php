<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftTrade;
use App\Shift;
use App\User;
use App\UserStamp;
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
		$days = [
			'Monday' => $request->input('checkboxMonday'),
			'Tuesday' => $request->input('checkboxTuesday'),
			'Wednesday' => $request->input('checkboxWednesday'),
			'Thursday' => $request->input('checkboxThursday'),
			'Friday' => $request->input('checkboxFriday'),
			'Saturday' => $request->input('checkboxSaturday'),
			'Sunday' => $request->input('checkboxSunday'),
		];
		
		$this->createShiftInterval($days, $request);
		
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
		public function createShiftInterval($days, $request) {
			//TODO: need to create shifts
			//Variables from Request
			$userId = $request->input('inputUserId');
			$intervalStart = $request->input('inputStartDate');
			$intervalEnd = $request->input('inputEndDate');
			$shiftStartTime = $request->input('inputStartTime') . ':00';
			$shiftEndTime = $request->input('inputEndTime') . ':00';
			
			$period = \Carbon\CarbonPeriod::create($intervalStart, $intervalEnd);
			$validDays = [];
			$validDays = array_keys($days, 1);
			$dates = [];
		
			foreach ($period as $date) {
				if(in_array($date->format('l'), $validDays  ))
				// $dates[] = $date;
				if (is_null($userId)) {
					
					$shift = new Shift;
					$shift->user_id = null;
					$shift->tradeable = 1;
					$shift->date = $date->setTimeFromTimeString($shiftStartTime);
					$shift->start_time = $date->setTimeFromTimeString($shiftStartTime);
					$shift->end_time = $date->setTimeFromTimeString($shiftEndTime);
					$shift->save();

					$shiftTrade = new ShiftTrade;
					$shiftTrade->shift_id = $shift->id;
					$shiftTrade->save();
				}else {
					
					$shift = new Shift;
					$shift->user_id = $userId;
					$shift->date = $date->setTimeFromTimeString($shiftStartTime);
					$shift->start_time = $date->setTimeFromTimeString($shiftStartTime)->toDateTimeString();
					$shift->end_time = $date->setTimeFromTimeString($shiftEndTime)->toDateTimeString();
					$shift->save();
				}	
			}
		}
		public function userStampsList() {
		$userStamps = UserStamp::waitingApproval()->get();
		return view('admin.userstamp.approval', compact('userStamps'));
	}

	public function approveUserStamps($userStampId){
		$userStamp = UserStamp::find($userStampId);
		//Set the userStamp to approved
		$userStamp->status = 'Approved';
		$userStamp->save();
		session()->flash('message', 'Du har nu godkendt ' . ' INDSÆT NAVN '  . 'stempling');
		return redirect()->back();
	}

}
