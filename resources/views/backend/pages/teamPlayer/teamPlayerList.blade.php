@extends("backend.master")

@section('content')
   
<h1> Team Player </h1>

<a href="{{route('teamPlayer.form')}}" class="btn btn-success">Team Player</a>
 


<br><br>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th> 
      <th scope="col">Team Name</th>
      <th scope="col">Player Name</th>   
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($teamPlayer as $data)

    <tr>
      <th>{{$data->id}}</th> 
      <td>{{$data->team->teamName}}</td> 
      <td>{{$data->player->fullName}}</td> 
      <td>
      <a href="{{route('teamPlayer.view',$data->id)}}" class="btn btn-primary">View</a>
        <a href="{{route('teamPlayer.edit',$data->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('teamPlayer.delete',$data->id)}}" class="btn btn-danger">Delete</a>  
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection