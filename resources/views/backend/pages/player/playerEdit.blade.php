
@extends('backend.master')
    @section('content')
<div>
<form action="{{route('player.update',$player->id)}}" method="post" enctype="multipart/form-data">

    @method('put')
    @csrf
       
  <div class="mb-3">
    <label for="Player Name" class="form-label">Player Name</label>
    <input type="text" name="player_name" class="form-control" id="" placeholder="Enter Player Name" value="{{$player->fullName}}">
  </div>

  <div class="mb-3">
    <label for="Born" class="form-label">Born</label>
    <input type="date" name="born" class="form-control" id="" placeholder="" value="{{$player->born}}">
  </div>

  <div class="mb-3">
    <label for="Birth Place" class="form-label">Birth Place</label>
    <input type="text" name="birth_place" class="form-control" id="" placeholder="" value="{{$player->birthPlace}}">
  </div>

  <div class="mb-3">
    <label for="Height" class="form-label">Height (m)</label>
    <input  name="height" class="form-control" id="" placeholder="" value="{{$player->height}}">
  </div> 

  <div class="mb-3">
    <label for="Playing Role" class="form-label">Playing Role</label>
    <input type="text" name="playing_role" class="form-control" id="" placeholder="" value="{{$player->playingRole}}">
  </div>

  <div class="mb-3">
    <label for="Batting style" class="form-label">Batting style</label>
    <input type="text" name="batting_style" class="form-control" id="" placeholder="" value="{{$player->battingStyle}}">
  </div>

  <div class="mb-3">
    <label for="Bowling Style" class="form-label">Bowling Style</label>
    <input type="text" name="bowling_style" class="form-control" id="" placeholder="" value="{{$player->bowlingStyle}}">
  </div>

  <div class="mb-3">
    <label for="Photo" class="form-label">Photo</label>
    <img width="100" src="{{url('images/player',$player->playerImage)}}" alt="">
    <input type="file" name="photo" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-control" name="status" id="">
    <option value="Active">Active</option>
    <option value="Inactive">Inactive</option>
    </select>
  </div>
 

  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

@endsection  

