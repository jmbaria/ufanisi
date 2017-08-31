<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Industry;
use App\Jobseeker;
use App\User;
use App\Job;
use App\Application;
use App\UserPermission;

class JobSeekerController extends Controller
{
    /**
     * Display a listing of the jobs applied for
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::getApplications();
        return view('jobseeker/applications',array(
            'applications' => $applications,
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::all();
        return view('jobseeker/create',array('industries' => $industries));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $jobseeker              = new Jobseeker;
       $jobseeker->name        = $request->name;
       $jobseeker->email       = $request->email;
       $jobseeker->phone       = $request->phone;
       $jobseeker->education   = $request->education;
       $jobseeker->experience  = $request->experience;
       $jobseeker->industry_id = $request->industry;
       $jobseeker->resume      = '';
       $id                     =  $jobseeker->save();

        //create a user in the users table

        $username = explode(' ', $request->name);
        $username = strtolower($username[0]);

        $password = rand(5555,999);
        $user = array(
        'name' => $username,
        'email' => $request->email,
        'password' => bcrypt($password)
        );

       $user = User::create($user);

       Log::info('user created: '.print_r($user,true));

       //create the user in the user permissions table;
        $user_permissions = new UserPermission;
        $user_permissions->user_id = $user->id;
        $user_permissions->permission_id = 2;
        $user_permission_id = $user_permissions->save();

       if($user = 1 and $user_permission_id = 1):
            Log::info('password for : '.$username.' is '.$password);
       endif;

       if($id){
        return Redirect::to('/jobs')->with('message', 'Your account has been created successfully');
      }else{
        return Redirect::to('/jobseeker/create')->with('message', 'Error while creating an account');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('jobseeker.view',array(
            'profile' => Jobseeker::getJobseekerProfile($id)
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
