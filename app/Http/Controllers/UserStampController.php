<?php

namespace App\Http\Controllers;

use App\UserStamp;
use App\Shift;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Telegram\Bot\Api;

class UserStampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        //Finder user object from id
        $user = User::find($id);
        
        if(is_null(UserStamp::unfinishedStamp()->first())){
            $view = view('user.stamp.index', compact('user'));
        }else{
            $userStamp = UserStamp::unfinishedStamp()->first();
            $view = view('user.stamp.index', compact('user', 'userStamp'));
           }
        
        return $view;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {

        if(!is_null(UserStamp::unfinishedStamp()->first())){
            $pause = $request->input('pause');
            $userStamp = UserStamp::unfinishedStamp()->first();
            $userShift = Shift::byDate($userStamp->id)->first();
            $userStamp->end_time = Carbon::now()->format('Y:m:d H:i:s');
            $userStamp->original_end_time = Carbon::now()->format('Y:m:d H:i:s');
            $userStamp->pause = $pause;
            
            $autoApprove = $this->autoApprove($userShift, $userStamp);
            $userStamp->save();
			//Telegram debug¨
			$telegram = new Api();
			$telegram->sendMessage([
				'chat_id' => '-386115157',
				'text' => '' . $userStamp->getUserName() . ' har lige afsluttet en tidsregistrering'
			]);
            return redirect()->route('myStamps', ['id' => $id, 'month' => Carbon::now()->month]);

        }else{

            $userStamp = new UserStamp;

            $userStamp->start_time = Carbon::now();
            $userStamp->original_start_time = Carbon::now();

            $userStamp->user_id = $id;

            $userStamp->save();
			//Telegram debug
			$telegram = new Api();
			$telegram->sendMessage([
				'chat_id' => '-386115157',
				'text' => '' . $userStamp->getUserName() . ' har lige startet en tidsregistrering'
			]);
            return redirect()->back()->with('id', $id);
        }
    }

    public function autoApprove($shift, $stamp){
       $result = false;
        $shiftStartTime = Carbon::parse($shift->start_time);
       $shiftEndTime = Carbon::parse($shift->end_time);
       $stampStartTime = Carbon::parse($stamp->start_time);
       $stampEndTime = Carbon::parse($stamp->end_time);
       $startDiffInMin = $shiftStartTime->diffInMinutes($stampStartTime);
       $endDiffInMin = $shiftEndTime->diffInMinutes($stampEndTime);
       if($startDiffInMin <= 10 && $endDiffInMin <= 10){
            $result = true;
            $stamp->status = 'approved';
           // $stamp->save();
        }
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserStamp  $userStamp
     * @return \Illuminate\Http\Response
     */
    public function show(UserStamp $userStamp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserStamp  $userStamp
     * @return \Illuminate\Http\Response
     */
    public function edit(UserStamp $userStamp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserStamp  $userStamp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserStamp $userStamp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserStamp  $userStamp
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserStamp $userStamp)
    {
        //
    }
}
