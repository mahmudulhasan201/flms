
    @extends('backend.master')
    @section('content')

    <h1>League Form</h1>
<div>
 <form action="{{route('league.form')}}" method="post" enctype="multipart/form-data"> 
    @csrf
  <div class="mb-3">
    <label for="league_name" class="form-label">League Name</label>
    <input type="text" name="name" class="form-control" id="" placeholder="Enter league Name">
  </div>

  <div class="mb-3">
    <label for="start_date" class="form-label">Starting Date</label>
    <input type="date" name="start_date" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="end_date" class="form-label">Ending Date</label>
    <input type="date" name="end_date" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="number_of_teams" class="form-label">Number Of Teams</label>
    <input type="number" name="number_of_teams" class="form-control" id="" placeholder="Enter Number Of Teams">
  </div>

  <div class="form-group">
  <label for="">Season</label>
  <select class="form-control" name="season_id" >
    <option value="">Select Season</option>
    @foreach($season as $data)
    <option value="{{$data->id}}">{{$data->seasonName}}</option>
    @endforeach
  </select>
</div>

  <div class="mb-3">
    <label for="league_logo" class="form-label">League Logo</label>
    <input type="file" name="league_logo" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select class="form-control" name="status" id="">
    <option value="Select Status">Select Status</option> 
    <option value="Active">Active</option>
    <option value="Inactive">Inactive</option>
    </select>
  </div>
 

  <button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

@endsection
