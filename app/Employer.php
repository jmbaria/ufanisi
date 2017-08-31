<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    public static function  getApplications(){
    	$applications = DB::table('applications as a')
	    	->select('a.id','c.title','b.name as industry','c.start_date','c.end_date','a.status','a.jobseeker_id','c.id as job_id')
	    	->leftJoin('jobs as c','c.id','=','a.job_id')
	    	->leftJoin('industries as b','b.id','=','c.industry_id')
	    	->where('c.employer_id','=',1)
    		->get();

    	return $applications;
    }
}
