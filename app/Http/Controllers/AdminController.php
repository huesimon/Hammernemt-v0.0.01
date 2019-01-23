<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftTrade;
use App\Shift;
use App\User;
use App\UserStamp;
use Telegram\Bot\Api;
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
		//Telegram debug
		$telegram = new Api();
		$telegram->sendMessage([
			'chat_id' => '-386115157',
			'text' => '' . \Auth::user()->getName() . ' har har nu accepteret byttet mellem... '
		]);
		session()->flash('message', 'Du har nu accepteret byttet mellem ' . ' INDSÆT NANV'  . ' og ' . 'INDSÆT NAVN2');
		return redirect()->route('adminTradeList');
	}
	
	public function declineTrade($shiftTradeId) {
		$shiftTrade = ShiftTrade::find($shiftTradeId);
		$originalOwner = User::find($shiftTrade->original_owner_id);
		$newOwner = User::find($shiftTrade->new_owner_id);
		$shiftTrade->new_owner_id = null;
		$shiftTrade->save();
		//Telegram debug
		$telegram = new Api();
		$telegram->sendMessage([
			'chat_id' => '-386115157',
			'text' => '' . \Auth::user()->getName() . ' har har nu AFVIST byttet mellem... '
		]);
		session()->flash('message', 'Du har nu AFVIST byttet mellem ' . $originalOwner->name . ' og ' . $newOwner->name);
		return redirect()->back();
	}

	public function createShiftView() {
		$users = User::all();
		return view('admin.shift.create', compact('users'));
	}

	public function createShift(Request $request) {
		// dd($request->input());		
		$nullCounter = 0;
		$days = [
			'Monday' => $request->input('checkboxMonday'),
			'Tuesday' => $request->input('checkboxTuesday'),
			'Wednesday' => $request->input('checkboxWednesday'),
			'Thursday' => $request->input('checkboxThursday'),
			'Friday' => $request->input('checkboxFriday'),
			'Saturday' => $request->input('checkboxSaturday'),
			'Sunday' => $request->input('checkboxSunday'),
		];
		foreach ($days as $day) {
			if(is_null($day)) {
				$nullCounter++;
			}
		}
		if($nullCounter == 7){
			$startDate = $request->input('inputStartDate');
			$this->createSingleShift($startDate, $request);
		} else {
			$this->createShiftInterval($days, $request);
		}
		
		//Telegram debug
		$telegram = new Api();
		$telegram->sendMessage([
			'chat_id' => '-386115157',
			'text' => '' . \Auth::user()->getName() . ' har nu oprettet en vagt. '
		]);
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
		//Telegram debug
		$telegram = new Api();
		$telegram->sendMessage([
			'chat_id' => '-386115157',
			'text' => '' . \Auth::user()->getName() . ' ser på userstamps der mangler godkendelse '
		]);
		return view('admin.userstamp.approval', compact('userStamps'));
	}
	public function createSingleShift($startTime, $request) {
		// TODO: Refactor these
		$userId = $request->input('inputUserId');
		$intervalStart = $request->input('inputStartDate');
		$intervalEnd = $request->input('inputEndDate');
		$shiftStartTime = $request->input('inputStartTime') . ':00';
		$shiftEndTime = $request->input('inputEndTime') . ':00';
		if (is_null($userId)) {
					
			$shift = new Shift;
			$shift->user_id = null;
			$shift->tradeable = 1;
			$shift->date = $startTime;
			$shift->start_time = $startTime;
			$shift->end_time = $startTime;
			$shift->save();

			$shiftTrade = new ShiftTrade;
			$shiftTrade->shift_id = $shift->id;
			$shiftTrade->save();
		}else {
			
			$shift = new Shift;
			$shift->user_id = $userId;
			$shift->date = $startTime;
			$shift->start_time = $startTime;
			$shift->end_time = $startTime;
			$shift->save();
		}
	}
	public function approveUserStamp($userStampId){
		$userStamp = UserStamp::find($userStampId);
		//Set the userStamp to approved
		$userStamp->status = 'Approved';
		$userStamp->save();
		//Telegram debug
		$telegram = new Api();
		$telegram->sendMessage([
			'chat_id' => '-386115157',
			'text' => '' . \Auth::user()->getName() . ' har har nu godkendt en stempling '
		]);
		session()->flash('message', 'Du har nu godkendt ' . ' INDSÆT NAVN '  . 'stempling');
		return redirect()->back();
	}

	public function rejectUserStamp($userStampId) {
		$userStamp = UserStamp::find($userStampId);
		$userStamp->status = 'Rejected';
		$userStamp->save();
		//Telegram debug
		$telegram = new Api();
		$telegram->sendMessage([
			'chat_id' => '-386115157',
			'text' => '' . \Auth::user()->getName() . ' har har nu AFVIST en stempling '
		]);
		session()->flash('message', 'Du har nu AFVIST stemplingen for ' . 'navn');
		return redirect()->back();
	}
}
