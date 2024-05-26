
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
      <label for="Player Email" class="form-label">Player Email</label>
      <input type="email" name="player_email" class="form-control" id="" placeholder="Enter Email Address">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="player_password" class="form-control" id="" placeholder="Enter Password">
    </div>

    <div class="mb-3">
      <label for="Born" class="form-label">Born</label>
      <input type="date" name="born" class="form-control" id="" placeholder="">
    </div>

    <div class="mb-3">
      <label for="Birth Place" class="form-label">Birth Place</label>
      <input type="text" name="birth_place" class="form-control" id="" placeholder="Enter Birth Place">
    </div>

    <div class="mb-3">
      <label for="height" class="form-label">Height (m)</label>
      <input type="number" name="height" class="form-control" id="height" 
       placeholder="Enter your height in meters" min="0.5" max="3" step="0.01" required>
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
      <label for="Photo" class="form-label">Player Image</label>
      <input type="file" name="photo" class="form-control" id="" placeholder="">
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Player Price</label>
      <input type="number" name="price" class="form-control" id="" placeholder="">
    </div>

    <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-control" name="status" id="">
    <option value="Active">Active</option>
    <option value="Inactive">Inactive</option>
    </select>
  </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection