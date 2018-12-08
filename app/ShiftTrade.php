<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftTrade extends Model
{
	public function scopeActive($query) {
		return $query->where('active', '=', 1);
	}

	public function scopeTradeable($query) {
		return $query->where('tradeable', '=', 1);
	}
}
