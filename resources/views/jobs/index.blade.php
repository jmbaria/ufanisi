@extends('layouts.main')
@section('content')

 <div class="container">
  <h2>Job Posts</h2>
  <table class="table table-hover" id="task-table">
    <thead>
      <tr>
        <th>Job Title</th>
        <th>Industry</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($jobs as $key => $value)
      <tr>
        <td><a href="/jobs/{{$value->id}}/view">{{$value->title}}</a></td>
        <td>{{$value->industry}}</td>
        <td>{{$value->start_date}}</td>
        <td>{{$value->end_date}}</td>
        <td>
        @if(strtolower($data['role']->name) == 'jobseeker')
        <div class="form-group float-label-control">
                        @if($role == 'jobseeker')
                        <form role="apply" method="post" action="/jobs/apply">    
                            <td>
                                <button class="btn btn-sm btn-success" type="submit">Apply</button>
                                <input type="hidden" name="job_id" value="{{$value->id}}">
                                <input type="hidden" name="jobseeker_id" value="{{Auth::id()}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </td>
                        </form>
                        @endif
                    </div>
                    @endif
                    </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@stop