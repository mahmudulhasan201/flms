@extends('backend.master')
@section('content')

<h1>Create Tournament Fixture</h1>
 <a href="{{route('fixture.form')}}" class="btn btn-primary">Create Fixture</a>
  <br><br>
  

<div>
  <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">League Id</th>
      <th scope="col">Home Team Id</th>
      <th scope="col">Away Team Id</th>
      <th scope="col">Session</th>
      <th scope="col">Date</th>
      <th scope="col">Venue Id</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  @foreach($makeFixture as $data) 

    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->league->leagueName}}</td>
      <td>{{$data->homeTeamId}}</td>
      <td>{{$data->awayTeamId}}</td>
      <td>{{$data->session}}</td>
      <td>{{$data->date}}</td>
      <td>{{$data->venue->venueName}}</td>
      <td>
        <a href="" class="btn btn-primary">View</a>
        <a href="" class="btn btn-success">Edit</a>
        <a href="{{route('fixture.delete',$data->id)}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>

  @endforeach 


  </tbody>
 </table>
</div>

{{$makeFixture->links()}}

@endsection 
