<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShiftTrade;
use App\UserStamp;
use Telegram\Bot\Api;

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
		//Telegram debug
		$telegram = new Api();
		$telegram->sendMessage([
			'chat_id' => '-386115157',
			'text' => '' . \Auth::user()->getName() . ' ser på dashboard '
		]);
        return view('user.dashboard', compact('tradeableShifts', 'shiftNeedApproval', 'stampsNeedApproval'));
    }
}
