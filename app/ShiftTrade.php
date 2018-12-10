<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shift;
use App\User;

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
	public function scopeWaitingApproval($query) {
		return $query
		->where('new_owner_id', '!=', null)
		->where('original_owner_id', '!=', null)
		->where('approved', '=', '0')
		->where('active', '=', '1');
	}
	public function getShift () {
		$shift = Shift::find($this->shift_id);
		return $shift;
	}
	public function getOriginalOwnerName() {
		$originalOwner = User::find($this->original_owner_id);
		return $originalOwner->name;
	}
	public function getNewOwnerName() {
		$newOwner = User::find($this->new_owner_id);
		return $newOwner->name;
	}
}
