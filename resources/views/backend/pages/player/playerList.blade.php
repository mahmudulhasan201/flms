@extends("backend.master")

@section('content')
   
<h1>Player List</h1>

<a href="{{route('player.form')}}" class="btn btn-success">Create player List</a><br><br>
 



 <div>
 <table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">ID</th> 
      <th scope="col">Player Name</th>
      <th scope="col">Born</th>
      <th scope="col">Birth Place</th>
      <th scope="col">Height (m)</th>
      <th scope="col">Playing Role</th>
      <th scope="col">Batting style</th> 
      <th scope="col">Bowling Style</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach($data as $player)    

      <td>{{$player->id}}</td>
      <td>{{$player->fullName}}</td>
      <td>{{$player->born}}</td>
      <td>{{$player->birthPlace}}</td>
      <td>{{$player->height}}</td>
      <td>{{$player->playingRole}}</td>
      <td>{{$player->battingStyle}}</td> 
      <td>{{$player->bowlingStyle}}</td>
      <td><img width="100" src="{{url('images/player',$player->playerImage)}}" alt=""></td>
      <td>
        <a href="{{route('player.edit',$player->id)}}" class="btn btn-success">Edit</a>
      <a href="{{route('player.view',$player->id)}}" class="btn btn-primary">View</a>
        <a href="{{route('player.delete',$player->id)}}" class="btn btn-danger">Delete</a> 
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
 </div>

{{$data->links()}}
@endsection  