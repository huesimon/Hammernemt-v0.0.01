<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
class Company extends Model
{
    public function scopeMyCompany($query, $id=null){
        //$user = DB::table('users')->where('id',$id)->first();
        //$companyId = $user->company_id;
        //$company = DB::table('companies')->where('id',$companyId)->first();
        //$myCompany = $company->name;
      //  return $myCompany;
    }
    public function scopeCompanyId($id){
        $user = DB::table('users')->where('id',$id)->first();
        $companyId = $user->company_id;
        $company = DB::table('companies')->where('id',$companyId)->first();
        $myCompany = $company->id;
        return $myCompany;
    }
    //
}
