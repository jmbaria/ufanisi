<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public static function  getApplications(){
    	$applications = DB::table('jobs as a')
	    	->select('a.id','a.title','b.name as industry','a.start_date','a.end_date','c.status')
	    	->leftJoin('industries as b','a.industry_id','=','b.id')
	    	->leftJoin('applications as c','a.id','=','c.job_id')
	    	->where('c.jobseeker_id','=',1)
    		->get();

    	return $applications; 
    }
}
