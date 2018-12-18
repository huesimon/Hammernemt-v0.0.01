<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserRole;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getDepartmentTitle(){
        //ToDo
        return "Hammernemt";
	}
	public function isAdmin() {
		if (UserRole::MyRole($this->user_role_id)->first()->type == 'admin' || UserRole::MyRole($this->user_role_id)->first()->type == 'Admin') {
			$result =  true;
		}else {
			$result = false;
		}
		return $result;
	}
}
