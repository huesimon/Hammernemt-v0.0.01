<?php

namespace App\Http\Controllers;

use App\UserStamp;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

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

        if(UserStamp::findByUser($id)){

            $pause = $request->input('pause');

            $userStamp = UserStamp::findByUser($id)->first();

            $userStamp->end_time = Carbon::now();

            $userStamp->pause = $pause;

            $userStamp->save();
            
            return redirect()->route('myStamps')->with('id', $id);

        }else{
            $userStamp = new UserStamp;

            $userStamp->start_time = Carbon::now();

            $userStamp->user_id = $id;

            $userStamp->save();

            return redirect()->back()->with('id', $id);
        }
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
