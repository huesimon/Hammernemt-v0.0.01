<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\User;

class UserStampController extends Controller
{
    public function index($id){
        $user = User::find($id);
        return view('stamp.index', compact('user'));
    }

    public function begin(){
        
    }

}
