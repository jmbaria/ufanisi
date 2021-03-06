@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <h2>Create Job Post</h2>
      
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
                        <input type="text" name="title" id="title" class="form-control" placeholder="Job Title" value="{{ isset($job->id) ? $job->title : old('title') }}">
                    </div>
                    <div class="form-group float-label-control">
                        <textarea class="form-control" name="description" id="description" placeholder="Job Description">{{ isset($job->id) ? $job->description : old('description') }}</textarea>
                    </div>
                    <div class="form-group float-label-control">
                        <input type="text" name="start_date" id="start_date" class="form-control" placeholder="Start Date" value="{{ isset($job->id) ? $job->start_date : old('start_date') }}">
                    </div>
                    <div class="form-group float-label-control">
                        <input type="text" name="end_date" id="end_date" class="form-control" placeholder="End Date" value="{{ isset($job->id) ? $job->end_date : old('end_date') }}">
                    </div>

                    <div class="form-group float-label-control">
                        <select name="industry" id="industry" class="form-control">
                        	@foreach($industries as $key => $value)
                        	<option {{isset($job->industry_id) ? ($job->industry_id == $value->id ? 'selected="selected"' : '') : old('industry_id') == $value->id ? 'selected="selected"' : '' }} value="{{$value->id}}">{{$value->name}}</option>
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