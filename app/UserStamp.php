<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserStamp extends Model
{

    public function scopeUnfinishedStamp($query){
        
        return $query->where('end_time', '=', null)
        ->where('user_id', '=', Auth::user()->id)
        ->where('start_time', '!=', null);
	}
	public function scopeWaitingApproval($query){
		return $query->where('approved', '=', 0)
		->where('end_time', '!=', null);
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
   
    public function scopeByMonth($query,$month){

        return $query->whereMonth('start_time','=',$month);
    }

    public function scopeByYear($query){
        $now = Carbon::now();
        $year = substr($now,0,4);

        return $query->whereYear('start_time', '=', $year);

	}
	public function getUserName() {
		$user = User::find($this->user_id);
		return $user->name;
	}
  
	public function getPayableHours() {
	$startTime = Carbon::parse($this->start_time);
	$endTime = Carbon::parse($this->end_time);
	
	$diffInMinutes = $startTime->diffInMinutes($endTime);
	$payableHours = date('H:i', mktime(0, $diffInMinutes));
	return $payableHours;	
	}


    public function getStartTimeFormatted($format){

       return Carbon::parse($this->start_time)->format($format);

    }

    public function getEndTimeFormatted($format){

        return Carbon::parse($this->end_time)->format($format);
    }
}
