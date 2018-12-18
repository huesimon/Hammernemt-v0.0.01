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
		$shift = new Shift;
		$shift->user_id = $userId;
		$shift->date = $startDate . ' ' .  $startTime;
		$shift->start_time = $startDate . ' ' .  $startTime;
		$shift->end_time = $endDate . ' ' .  $endTime;
		$shift->save();
		

		}

}
