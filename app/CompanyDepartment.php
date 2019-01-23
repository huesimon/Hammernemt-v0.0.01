<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
class CompanyDepartment extends Model
{
public function scopeMyDepartment($id){
    $user = DB::table('users')->where('id', $id)->first();
    $departmentId = $user->department_id;
    $companyId = Company::CompanyId($id)->get();
    $companyDepartment = DB::table('company_departments')->where('company_id',$companyId)->where('id',$departmentId)->first();
    $myDepartment = $companyDepartment->name;
    return $myDepartment;
}
}
