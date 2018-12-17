<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserStamp extends Model
{

    public function scopeUnfinishedStamp($query){
        return $query->where('end_time', '=', null)
        ->where('user_id', '=', Auth::user()->id)
        ->where('start_time', '!=', null);
    }

    public function scopeFindByUser($query, $userId){

        return $query->where('user_id', '=', $userId);

    }

    public function scopeMyStamps($query, $userId = null){
        $now = Carbon::now();
        return $query->where('user_id', '=', $userId);
    }
    public function scopeMonthAndYear($query, $month, $year,$userId=null){
        return $query->where('user_id', '=', $userId)->where('start_time');

    }
    private function getDate(){
        $startTime =substr(UserStamp::find(1)->start_time, 0, 10);
        dd($startTime);

    }
    public  function scopeStampByDate($query, $month, $year, $uid){
        //SELECT * FROM `user_stamps` WHERE month(start_time)=11 and year(start_time)=2018
        //SELECT * FROM `user_stamps` WHERE  month(start_time)=11 and year(start_time)=2018 and user_id=102


    }
}
