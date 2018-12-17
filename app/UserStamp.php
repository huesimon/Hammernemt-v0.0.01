<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserStamp extends Model
{
    public function scopeUnfinishedStamp($query){
        return $query->where('end_time', '=', null)->where('user_id', '=', Auth::user()->id);
    }

    public function scopeFindByUser($query, $userId){

        return $query->where('user_id', '=', $userId);

    }
}
