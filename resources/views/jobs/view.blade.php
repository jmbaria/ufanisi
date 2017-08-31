@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <h2>Create Job Post</h2>
      
        <hr />

        <div class="row">
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Features
                        </h3>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <li>Very customizable</li>
                            <li>Works with Bootstrap's native form examples</li>
                            <li>Uses CSS transitions for fallback browser support</li>
                            <li>Placeholder override for labels when fields are empty</li>
                            <li>Included authored jQuery plugin</li>
                            <li>Optional bottom label positioning with the <code>.label-bottom</code> utility</li>
                            <li>Works great with Chrome's AutoComplete</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                    <div class="form-group float-label-control">
                        @if($role == 'jobseeker')
                        <form role="apply" method="post" action="/jobs/apply">    
                            <td>
                                <button class="btn btn-sm btn-success" type="submit">Apply</button>
                                <input type="hidden" name="job_id" value="{{$job->id}}">
                                <input type="hidden" name="jobseeker_id" value="{{rand(0,10)}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </td>
                        </form>
                        @endif
                    </div>
                    <div class="form-group float-label-control">
                        <strong>Title: </strong>
                        {{ isset($job->id) ? $job->title : old('title') }}
                    </div>
                    <div class="form-group float-label-control">
                        <strong>Description:</strong> {{ isset($job->id) ? $job->description : old('description') }}
                    </div>
                    <div class="form-group float-label-control">
                        <strong>Start Date: </strong>
                        {{ isset($job->id) ? $job->start_date : old('start_date') }}
                    </div>
                    <div class="form-group float-label-control">
                        <strong>End Date</strong>
                        {{ isset($job->id) ? $job->end_date : old('end_date') }}
                    </div>

                    <div class="form-group float-label-control">
                        <strong>Industry: </strong>
                        {{ isset($job->id) ? $job->industry : old('industry') }}
                    </div>
            </div>
        </div>
    </div>
</div>
@stop