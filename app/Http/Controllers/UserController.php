<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use App\Http\Requests;
use App\UserStamp;
//use App\Http\Controllers\Controller;
use Carbon\Carbon;

class UserController extends Controller
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

    /**
     *
     * Getting stamps from one user
     */

    public function  myStamps($id){

        $myStamps = UserStamp::myStamps($id)->get();
        
        $month = Carbon::now();
        //Telegram debug
		$telegram = new Api();
		$telegram->sendMessage([
			'chat_id' => '-386115157',
			'text' => '' . $myStamps->getUserName() . ' ser sine timeoversigt'
		]);
        return view('user.mystamps',compact('myStamps'));
    }


    public function selectMonth($id,$month){

        $myStamps = UserStamp::myStamps($id)->byMonth($month)->byYear()->get();

        return view('user.mystamps',compact('myStamps'));
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

    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function destroy($id){
        //
    }
}
