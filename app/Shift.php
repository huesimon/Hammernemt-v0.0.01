<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shift extends Model
{
	public function getStartDateTimeUTC () {
		return $this->startTime;
	}
	public function getEndDateTimeUTC () {
		return $this->endTime;
	}
	public function getStartTimeCarbon () {
		$startTime = Carbon::parse($this->startTime);
	}
	public function getEndTimeCarbon () {
		$endTime = Carbon::parse($this->endTime);
	}
}
