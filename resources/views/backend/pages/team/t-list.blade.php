@extends("backend.master")

@section('content')
   
<h1>Team List</h1>

<a href="{{route('team.form')}}" class="btn btn-success">Create Team List</a><br><br>
 
<div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Team Name</th>
      <th scope="col">Team Logo</th>
      <th scope="col">Coach Name</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Owner Email</th>
      <th scope="col">Password</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($data as $team) 

    <tr>
      <td>{{$team->id}}</td>
      <td>{{$team->teamName}}</td>
      <td><img style="width: 100px; height: 100px" src="{{url('images/team',$team->teamLogo)}}" alt=""></td>
      <td>{{$team->coachName}}</td>
      <td>{{$team->ownerName}}</td>
      <td>{{$team->ownerEmail}}</td>
      <td>{{$team->password}}</td>
      <td>{{$team->status}}</td>
    <td>
        <a href="" class="btn btn-primary">View</a>
        <a href="" class="btn btn-success">Edit</a>
        <a href="{{route('team.delete',$team->id)}}" class="btn btn-danger">Delete</a>
     </td>

    </tr>
@endforeach 


  </tbody>
</table>
</div>
{{$data->links()}}
@endsection 


