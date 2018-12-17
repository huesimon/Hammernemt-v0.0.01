<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftTrade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//if a user is logged in, let them see the dashboard
		$shifts = ShiftTrade::active()->noNewOWner()->get();

        return view('user.dashboard', compact('tradeableShifts'));
    }
}
