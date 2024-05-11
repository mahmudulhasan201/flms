@extends('backend.master')
    @section('content')
<div>
<form action="{{route('teamPlayer.form')}}" method="post" enctype="multipart/form-data">
    @csrf
       
  <div class="mb-3">
    <label for="description" class="form-label">Team Id</label>
    <input name="team_id" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="player id" class="form-label">Player Id</label>
    <input name="player_id" class="form-control" id="" placeholder="">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div> 

@endsection
