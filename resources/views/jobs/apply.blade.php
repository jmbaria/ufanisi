@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <h2>Create Job Seeker Account</h2>
      
        <hr />

        <div class="row">
            <div class="col-sm-4">
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
            <div class="col-sm-8">
                <form role="jobpost" method="post" action="/jobs/post">
                    <div class="form-group float-label-control">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Job Title">
                    </div>
                    <div class="form-group float-label-control">
                        <textarea class="form-control" name="description" id="description" placeholder="Job Description"></textarea>
                    </div>
                    <div class="form-group float-label-control">
                        <input type="text" name="start_date" id="start_date" class="form-control" placeholder="Start Date">
                    </div>
                    <div class="form-group float-label-control">
                        <input type="text" name="end_date" id="end_date" class="form-control" placeholder="End Date">
                    </div>

                    <div class="form-group float-label-control">
                        <select name="industry" id="industry" class="form-control">
                        	@foreach($industries as $key => $value)
                        	<option value="{{$value->id}}">{{$value->name}}</option>
                        	@endforeach
                        </select>
                    </div>

                    <div class="form-group float-label-control">
                        <input type="submit" name="submit" class="btn-primary form-control" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@stop