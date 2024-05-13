
@extends('backend.master')
    @section('content')
<div>
<form action="{{route('player.form')}}" method="post" enctype="multipart/form-data">
    @csrf
       <h1>Player Form</h1>
  <div class="mb-3">
    <label for="Player Name" class="form-label">Player Name</label>
    <input type="text" name="player_name" class="form-control" id="" placeholder="Enter Player Name">
  </div>

  <div class="mb-3">
    <label for="Born" class="form-label">Born</label>
    <input type="date" name="born" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="Birth Place" class="form-label">Birth Place</label>
    <input type="text" name="birth_place" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="Height" class="form-label">Height (m)</label>
    <input type="number" name="height" class="form-control" id="" placeholder="">
  </div> 

  <div class="mb-3">
    <label for="Playing Role" class="form-label">Playing Role</label>
    <input type="text" name="playing_role" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="Batting style" class="form-label">Batting style</label>
    <input type="text" name="batting_style" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="Bowling Style" class="form-label">Bowling Style</label>
    <input type="text" name="bowling_style" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="Photo" class="form-label">Photo</label>
    <input type="file" name="photo" class="form-control" id="" placeholder="">
  </div>
 

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection  

