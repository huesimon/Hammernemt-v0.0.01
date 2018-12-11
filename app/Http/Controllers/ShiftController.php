<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shift;
use App\ShiftTrade;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
	}
	
	public function all () {
		$shifts = Shift::all();
   		return $shifts;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$shift = Shift::find($id);
		return $shift;
	}
	
	public function releaseInfo($id)
    {
		$shift = Shift::find($id);
		return view('shift.release', compact('shift'));
	}
	/**
     * Release a shift (shift will become tradeable)
     *
     * @param  Request $request
     * @return Request
     */
	public function releaseShift(Request $request)
    {
		$shiftId = $request->get('shift_id');
		$userId = $request->get('user_id');
		$comment = $request->get('comment');
		$shiftTrade = new ShiftTrade;
		$shift = Shift::find($shiftId);
		$shiftTrade->shift_id = $shiftId;
		$shiftTrade->original_owner_id = $userId;
		$shiftTrade->new_owner_id = null;
		$shiftTrade->approved = 0;
		$shiftTrade->comment = $comment;
		$shiftTrade->active = 1;
		$shiftTrade->save();
		session()->flash('message', 'Du har nu frigivet din vagt ' . $shift->getTitle());
		return redirect()->route('home');
	}
	
	public function tradeList() {
		//return a view with all tradeable shifts
		//All shifts without a owner are tradeable right?
		$tradeableShfits = ShiftTrade::noNewOwner()->active()->get();
		return view('trade.list', compact('tradeableShfits'));
	}

	public function acceptTrade($shiftTradeId) {
		//Page with a confirmation to accept the trade
		//Need to know who the current user is (who is logged in)
		//Check if their id is different to the original owner
		//Let them complete the trade
		//Save the ShiftTrade
		$shiftTrade = ShiftTrade::find($shiftTradeId);
		//Check if Auth::user is the one that made the trade
		if ( !is_null(Auth::user()) &&
			$shiftTrade->original_owner_id != Auth::user()->id) {
			$shiftTrade->new_owner_id = Auth::user()->id;
			$shiftTrade->save();
			session()->flash('message', 'Du har nu anmodet om vagnten, venter på accept af leder.');
		} else {
			session()->flash('message', 'Du kan ikke anmode om din egen vagt.');
		}
		return redirect()->back();
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
