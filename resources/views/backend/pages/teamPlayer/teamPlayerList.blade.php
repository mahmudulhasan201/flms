@extends("backend.master")

@section('content')
   
<h1> Team Player </h1>

<a href="{{route('teamPlayer.form')}}" class="btn btn-success">Team Player</a>
 


<br><br>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th> 
      <th scope="col">Team Id</th>
      <th scope="col">Player Id</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($teamPlayer as $data)

    <tr>
      <th>{{$data->id}}</th> 
      <td>{{$data->teamId}}</td> 
      <td>{{$data->playerId}}</td> 
      <td>
      <a href="" class="btn btn-primary">View</a>
        <a href="" class="btn btn-success">Edit</a>
        <a href="" class="btn btn-danger">Delete</a> 
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection