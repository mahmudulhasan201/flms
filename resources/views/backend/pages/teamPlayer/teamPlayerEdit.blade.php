@extends('backend.master')
    @section('content')
<div>
<form action="{{route('teamPlayer.update',$editTeamPlayer->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
       <h1>Edit Team Player Form</h1>
  <div class="mb-3">
    <label for="description" class="form-label">Team Id</label>
    <select name="team_id" class="form-control">
      <option value="">Select Team</option>
    @foreach($team as $data)
    <option value="{{$data->id}}">{{$data->teamName}}</option> 
    @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Player Id</label>
    <select name="player_id" class="form-control">
      <option value="">Select Player</option> 
      @foreach($player  as $data)
      <option value="{{$data->id}}">{{$data->fullName}}</option>
      @endforeach  
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form> 
</div> 

@endsection
