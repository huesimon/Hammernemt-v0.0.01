<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Shift extends Model
{
    public function scopeMyShift($query, $userId = null) {
		return $query->where('user_id', '=', $userId);
	}

	public function getUser() {
		$user = User::find($this->user_id);
		return $user;
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
