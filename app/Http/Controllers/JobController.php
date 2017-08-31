<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Industry;
use App\Job;
use App\Application;
use App\Interview;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::getJobPosts();
        $role = 'jobseeker';
        return view('jobs/index',array(
            'jobs' => $jobs,
            'role' => $role
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
        return view('jobs/create',array('industries' => $industries));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $job              = new Job;
       $job->title       = $request->title;
       $job->description = $request->description;
       $job->start_date  = $request->start_date;
       $job->end_date    = $request->end_date;
       $job->industry_id = $request->industry;
       $job->employer_id = isset($request->employer_id) ? $request->employer_id : 1;
       $id               =  $job->save();

       if($id){
        return Redirect::to('/jobs')->with('message', 'Job Post Created Successfully');
      }else{
        return Redirect::to('/job/create')->with('message', 'Error while creating job post');
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
        $job = Job::getJobPost($id);
        $role = 'jobseeker';
        $industries = Industry::all();
        return view('jobs.view',array(
            'job' => $job,
            'industries' => $industries,
            'role' => $role
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
        $job = Job::find($id);
        $industries = Industry::all();
        return view('jobs.create',array(
            'job' => $job,
            'industries' => $industries
            )
        );
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

    /**
     * Apply for a job
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apply(Request $request)
    {
        $application               = new Application;
        $application->jobseeker_id = $request->jobseeker_id;
        $application->job_id       = $request->job_id;
        $application->status       = 0; //pending
        $id                        = $application->save();

        if($id){
        return Redirect::to('/jobs/')->with('message', 'You have successfully applied for this job');
      }else{
        return Redirect::to('/job/create')->with('message', 'Error occured while applying for this job post');
      }
    }


    /**
     * Invite Applicant
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invite(Request $request)
    {
        if(!isset($request->job_id)){
            echo 'sorry, this is not a proper request';
            exit;
        }
        $interview                 = new Interview();
        $interview->job_id         = $request->job_id;
        $interview->jobseeker_id   = $request->jobseeker_id;
        $interview->interview_date = date('Y-m-d');
        $interview->status         = 0;
        $id                        = $interview->save();


        //update the application status so the job seeker also knows about it
        $application         = Application::find($request->application_id);
        $application->status = 1;
        $app_id              = $application->save();


        if($id == 1 and $app_id ==1){
            $response = array(
                'status' => 1,
                'id' => $request->application_id,
                'message' => 'Invitation sent successfully'
                );
        }else{
            $response = array(
                'status' => 0,
                'message' => 'Error occured while sending invitation'
                );
        }


        return $response;
    }


    /**
     * Reject Applicant
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request)
    {
        if(!isset($request->job_id)){
            echo 'sorry, this is not a proper request';
            exit;
        }

        //update the application status so the job seeker also knows about it
        $application         = Application::find($request->application_id);
        $application->status = 2;
        $app_id              = $application->save();

        if($app_id ==1){
            $response = array(
                'status' => 1,
                'id' => $request->application_id,
                'message' => 'Invitation rejected successfully'
                );
        }else{
            $response = array(
                'status' => 0,
                'message' => 'Error occured while rejecting application'
                );
        }
        return $response;
    }

}
