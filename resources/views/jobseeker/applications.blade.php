@extends('layouts.main')
@section('content')

 <div class="container">
  <h2>Job Applications</h2>
  <table class="table table-hover" id="task-table">
    <thead>
      <tr>
        <th>Job Title</th>
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
        <td>{{$value->industry}}</td>
        <td>{{$value->start_date}}</td>
        <td>{{$value->end_date}}</td>
        <td>{{$value->status ==0 ? 'Pending' : 'Successful'}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@stop