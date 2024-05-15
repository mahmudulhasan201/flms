
@extends('backend.master')
    @section('content')
<div>
 <form action="{{route('league.update',$editLeague->id)}}" method="post" enctype="multipart/form-data"> 

 @method('put')
    @csrf
        <h1> Edit League Form</h1>
  <div class="mb-3">
    <label for="league_name" class="form-label">League Name</label> 
    <input value="{{$editLeague->leagueName}}" type="text" name="name" class="form-control" id="" placeholder="">
  </div>

  <div class="form-group">
  <label for="">Season</label>
  <select class="form-control" name="season_id" >
    <option value="">{{$editLeague->season->seasonName}}</option>
    @foreach($season as $data)
    <option value="{{$data->id}}">{{$data->seasonName}}</option>
    @endforeach
  </select>
</div>

  <div class="mb-3">
    <label for="start_date" class="form-label">Starting Date</label> 
    <input value="{{$editLeague->starting_date}}" type="date" name="start_date" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="end_date" class="form-label">Ending Date</label> 
    <input value="{{$editLeague->ending_date}}" type="date" name="end_date" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="number_of_teams" class="form-label">Number Of Teams</label> 
    <input value="{{$editLeague->numberOfTeams}}" type="number" name="number_of_teams" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="league_logo" class="form-label">League Logo</label>
    <input value="{{$editLeague->leagueLogo}}" type="file" name="league_logo" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="Status" class="form-label">Status</label>
    <input value="{{$editLeague->status}}" name="status" class="form-control" id="" placeholder="status">
  </div>
 

  <button type="submit" class="btn btn-primary">Update</button>
 </form>
</div>

@endsection
