<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
}
