<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftTrade;
use App\UserStamp;

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
		$tradeableShifts = ShiftTrade::active()->noNewOWner()->get();
		//shiftNeedAppoval is only for admin
		$shiftNeedApproval = ShiftTrade::active()->waitingApproval()->get();	

		$stampsNeedApproval = UserStamp::waitingApproval()->get();

        return view('user.dashboard', compact('tradeableShifts', 'shiftNeedApproval', 'stampsNeedApproval'));
    }
}
