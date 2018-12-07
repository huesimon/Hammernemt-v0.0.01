<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shift extends Model
{
	public function getStartDateTimeUTC () {
		$startTime = Carbon::parse($this->startTime)->format('Y-m-d\TH:i:s.uP T');
		return $startTime;
	}
	public function getEndDateTimeUTC () {
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
}
