<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public static function  getJobPosts(){
        DB::connection()->enableQueryLog();
    	$jobs = DB::table('jobs as a')
	    	->select('a.id','a.title','b.name as industry','a.start_date','a.end_date')
	    	->leftJoin('industries as b','a.industry_id','=','b.id')
    		->get();
        $q = DB::getQueryLog();
        print_r(end($q));
    	return $jobs; 
    }


    public static function  getJobPost($id){
    	$job = DB::table('jobs as a')
	    	->select('a.id','a.title','a.description','b.name as industry','a.start_date','a.end_date')
	    	->leftJoin('industries as b','a.industry_id','=','b.id')
	    	->where('a.id','=',$id)
    		->first();

    	return $job; 
    }

}
