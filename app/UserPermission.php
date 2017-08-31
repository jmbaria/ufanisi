<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    public static function getUserRole(){
    	$role = DB::table('user_permissions as a')
    			->select('b.name')
    			->leftJoin('permissions as b','a.permission_id','=','b.id')
    			->where('a.user_id','=',Auth::id())
    			->first();

		return $role;
    }
}
