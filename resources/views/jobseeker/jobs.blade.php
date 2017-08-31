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
        <td><a href="/post/{{$value->id}}">{{$value->title}}</a></td>
        <td>{{$value->industry}}</td>
        <td>{{$value->start_date}}</td>
        <td>{{$value->end_date}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@stop