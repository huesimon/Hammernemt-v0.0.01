<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserStamp extends Model
{

	public function scopeActive($query) {
		return $query->where('active', '=', 1);
	}
	
    public function scopeUnfinishedStamp($query){
        
        return $query->where('end_time', '=', null)
        ->where('user_id', '=', Auth::user()->id)
        ->where('start_time', '!=', null);
	}
    
	public function scopeWaitingApproval($query){
        
        return $query->where('status', '=', 'pending')
        ->where('end_time', '!=', null);
    }

    public function scopeFindByUser($query, $userId){

        return $query->where('user_id', '=', $userId);
    }

    public function scopeMyStamps($query, $userId = null){

        return $query->where('user_id', '=', $userId);
    }

    public function scopeMonthAndYear($query, $month, $year,$userId=null){
        
        return $query->where('user_id', '=', $userId)->where('start_time');
    }
       
    public function scopeByMonth($query,$month){

        return $query->whereMonth('start_time','=',$month);
    }

    public function scopeByYear($query){

        $year = Carbon::now()->format('Y');

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
    public function getPayableHoursInMin() {
    
        $startTime = Carbon::parse($this->start_time);
        $endTime = Carbon::parse($this->end_time);
        
        $diffInMinutes = $startTime->diffInMinutes($endTime);
	        
        return $diffInMinutes;	
    }
    //lægger alle timer sammen for en lønperiode
    public function getSum(User $user, $month){
        $myStamps = UserStamp::myStamps($user->id)->byMonth($month)->byYear()->get();
        $sum = 0;
        foreach($myStamps as $stamp){
            $sum = $sum + $stamp->getPayableHoursInMin();
        }
        $sum = date('H:i', mktime(0, $sum));
        return $sum;
    }

    public function getStartTimeFormatted($format){

       return Carbon::parse($this->start_time)->format($format);
    }

    public function getEndTimeFormatted($format){

        return Carbon::parse($this->end_time)->format($format);
    }
}
