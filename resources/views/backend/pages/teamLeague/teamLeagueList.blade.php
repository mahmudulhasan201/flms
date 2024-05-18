@extends("backend.master")

@section('content')
   
<h1> Team League </h1>

<a href="{{route('teamLeague.form')}}" class="btn btn-success">Create season</a>
 


<br><br>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">League Name</th>
      <th scope="col">Team Name</th>
      <th scope="col">Season Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>


  <tbody>
@foreach($varTeamLeague as $data) 
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->league->leagueName}}</td>
      <td>{{$data->team->teamName}}</td>
      <td>{{$data->season->seasonName}}</td>
      <td>
        <a href="" class="btn btn-primary">View</a>
        <a href="" class="btn btn-success">Edit</a>
        <a href="{{route('team.league.delete',$data->id)}}" class="btn btn-danger">Delete</a>
    <td>
    </tr>
    
@endforeach     
  </tbody>

</table>
@endsection 
