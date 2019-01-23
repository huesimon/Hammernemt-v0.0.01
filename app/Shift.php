<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;

class Shift extends Model
{
    public function scopeMyShift($query, $userId = null) {
		return $query->where('user_id', '=', $userId);
	}

	public function scopeByDate($query, $stampId = null){
		$stamp = UserStamp::find($stampId);
		$startTime = Carbon::parse($stamp->start_time)->format('Y-m-d');
		//return $query->where('DATE(start_time)', '=', $startTime);
		$shift = DB::table('shifts')->whereRaw('DATE(start_time)'. '='. $startTime)->get();
	}

	public function getUser() {
		$user = User::find($this->user_id);
		return $user;
	}
	public function getUserName() {
		$user = User::find($this->user_id);
		
		if (is_null($user)) {
			$userName = 'Ledig vagt';
		}else{
			$userName = $user->name;
		}
		return $userName;
	}
	/**
	 * @return title String
	 * Return the title of the shift
	 */
	public function getTitle() {
		//TODO
		return $this->id;
	}

	public function getDate(){
		return Carbon::parse($this->start_time)->format('Y-m-d');
	}
	public function getTimeFormattedDateStartEnd() {
		$date = $this->getDate();
		$startTime = Carbon::parse($this->start_time)->format('H:i:s');
		$endTime = Carbon::parse($this->end_time)->format('H:i:s');
		return 'Dato: ' . $date . 'Tidspunkt: '. $startTime . ' - ' . $endTime;
	}
	public function getTimeFormattedDateStartEndNewLine() {
		$date = $this->getDate();
		$startTime = Carbon::parse($this->start_time)->format('H:i:s');
		$endTime = Carbon::parse($this->end_time)->format('H:i:s');
		return 'Dato: ' . $date . '<br>' . 'Tidspunkt: '. $startTime . ' - ' . $endTime;
	}
}
