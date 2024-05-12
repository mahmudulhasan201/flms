@extends('backend.master')
    @section('content')
<div>
<form action="{{route('teamPlayer.form')}}" method="post" enctype="multipart/form-data">
    @csrf
       
  <div class="mb-3">
    <label for="description" class="form-label">Team Id</label>
    <select name="team_id" class="form-control">
      <option value="">Select Team</option>
    @foreach($takeTeamId as $data)
    <option value="{{$data->id}}">{{$data->teamName}}</option>
    @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Player Id</label>
    <select name="player_id" class="form-control">
      <option value="">Select Player</option> 
      @foreach($takePlayerId  as $data)
      <option value="{{$data->id}}">{{$data->fullName}}</option>
      @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
</div> 

@endsection
