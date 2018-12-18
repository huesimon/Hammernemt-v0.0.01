<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public function scopeMyRole($query, $roleId) {
		return $query->where('id', '=', $roleId);
	}
}