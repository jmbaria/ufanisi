@extends('layouts.main')
@section('content')

 <div class="container">
  <h2>Job Applications</h2>
  <table class="table table-hover" id="task-table">
    <thead>
      <tr>
        <th>Job Title</th>
        <th>Applicant</th>
        <th>Industry</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($applications as $key => $value)
      <tr>
        <td><a href="/jobs/{{$value->id}}/view">{{$value->title}}</a></td>
        <td><a href="/jobseeker/{{$value->applicant_id}}/view">{{$value->applicant}}</a></td>
        <td>{{$value->industry}}</td>
        <td>{{$value->start_date}}</td>
        <td>{{$value->end_date}}</td>
        <td><div class="btn-group">
              <button type="button" class="btn-{{$value->id}} btn btn-{{$value->status ==0 ? 'info' : ($value->status ==1 ? 'success' : 'danger')}}">{{$value->status ==0 ? 'Pending' : ($value->status ==1 ? 'Invited' : 'Rejected')}}</button>
              <button type="button" id="btn-{{$value->id}}" class="btn btn-{{$value->status ==0 ? 'info' : ($value->status ==1 ? 'success' : 'danger')}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="javascript:void(0)" class="invite" job-id="{{$value->job_id}}" application-id="{{$value->id}}" jobseeker-id="{{$value->jobseeker_id}}">Invite</a></li>
                <li><a href="javascript:void(0)" class="reject" job-id="{{$value->job_id}}" application-id="{{$value->id}}" jobseeker-id="{{$value->jobseeker_id}}">Reject</a></li>
              </ul>
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@stop