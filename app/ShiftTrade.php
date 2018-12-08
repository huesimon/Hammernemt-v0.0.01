<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftTrade extends Model
{
	public function scopeActive($query) {
		return $query->where('active', '=', 1);
	}

	public function scopeApproved($query) {
		return $query->where('approved', '=', 1);
	}
	public function scopeNotApproved($query) {
		return $query->where('approved', '=', 0);
	}
	public function scopeNoNewOwner($query) {
		return $query->where('new_owner_id', '=', null);
	}
}
