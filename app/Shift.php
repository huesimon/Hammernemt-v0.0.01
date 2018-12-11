<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;

class Shift extends Model
{
	public function getStartDateTimeUTC () {
		// //the formatting should return utc
		// $startTime = Carbon::parse($this->startTime)->format('Y-m-d\TH:i:s.uP T');
		$startTime = Carbon::createFromFormat('Y-m-d H:i:s', $this->startTime, 'Europe/Copenhagen');
		return $startTime;
	}
	public function getEndDateTimeUTC () {
		//the formatting should return utc
		$endTime = Carbon::parse($this->endTime)->format('Y-m-d\TH:i:s.uP T');
		return $endTime;
	}
	public function getStartTimeCarbon () {
		$startTime = Carbon::parse($this->startTime);
		return $startTime;
	}
	public function getEndTimeCarbon () {
		$endTime = Carbon::parse($this->endTime);
		return $endTime;
	}

	public function scopeMyShift($query, $userId = null) {
		return $query->where('user_id', '=', $userId);
	}

	public function getDate(){
		return Carbon::parse($this->start_time)->format('Y-m-d');
	}

	public function getStartTime(){
		return Carbon::parse($this->start_time)->format('H:i:s');
	}

	public function getEndTime(){
		return Carbon::parse($this->end_time)->format('H:i:s');
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
}
