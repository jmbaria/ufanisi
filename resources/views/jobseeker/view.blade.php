@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <h2>View Jobseeker Profile: {{ isset($profile->id) ? $profile->name : 'missing value*' }}</h2>
      
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
                        <strong>Email:</strong> {{ isset($profile->id) ? $profile->email : 'missing value*' }}
                    </div>
                    <div class="form-group float-label-control">
                        <strong>Phone: </strong>
                        {{ isset($profile->id) ? $profile->phone : 'missing value*' }}
                    </div>
                    <div class="form-group float-label-control">
                        <strong>Education</strong>
                        {{ isset($profile->id) ? $profile->education : 'missing value*' }}
                    </div>

                    <div class="form-group float-label-control">
                        <strong>Experience: </strong>
                        {{ isset($profile->id) ? $profile->experience : 'missing value*' }}
                    </div>

                    <div class="form-group float-label-control">
                        <strong>Industry: </strong>
                        {{ isset($profile->id) ? $profile->industry : 'missing value*' }}
                    </div>
            </div>
        </div>
    </div>
</div>
@stop