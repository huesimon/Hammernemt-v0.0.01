<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
		$shiftTrade = new ShiftTrade;
		$shiftTrade->original_owner_id = 2;
		$shiftTrade->new_owner_id = 4;
		$shiftTrade->approved = 0;
		$shiftTrade->active = 1;
		$shiftTrade->save();

		return $shiftTrade;
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
