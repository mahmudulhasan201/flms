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
      <th scope="col">League</th>
      <th scope="col">Home Team</th>
      <th scope="col">Away Team</th>
      <th scope="col">Session</th>
      <th scope="col">Date</th>
      <th scope="col">Venue</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  @foreach($makeFixture as $data) 

    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->league->leagueName}}</td>
      <td>{{$data->homeTeam->teamName}}</td>
      <td>{{$data->awayTeam->teamName}}</td>
      <td>{{$data->session}}</td>
      <td>{{$data->date}}</td>
      <td>{{$data->venue->venueName}}</td>
      <td>
        <a href="{{route('fixture.view',$data->id)}}" class="btn btn-primary">View</a>
        <a href="{{route('fixture.edit',$data->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('fixture.delete',$data->id)}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>

  @endforeach 


  </tbody>
 </table>
</div>

{{$makeFixture->links()}}

@endsection 
