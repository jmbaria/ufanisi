<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Jobseeker extends Model
{
    public static function getJobseekerProfile(){
    	$profile = DB::table('jobseekers as a')
    				->select('a.id','a.name','a.email','a.phone','a.education','a.experience','b.name as industry')
    				->leftJoin('industries as b','a.industry_id','=','b.id')
    				->first();

		return $profile;
    }
}
