@extends('backend.master')
@section('content')

<div>
 <form action="{{route('fixture.form')}}" method="post" enctype="multipart/form-data"> 
    @csrf

 <div class="container">
 <h1>Create Fixture</h1> <br>      
  <div class="mb-3">
    <label for="home_team_id" class="form-label">Home Team Id </label>
    <input type="text" name="home_team_id" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Away Team Id</label>
    <input type="text" name="awaay_team_id" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="session" class="form-label">Session</label>
    <!-- <input type="text" name="session" class="form-control" id="" placeholder=""> -->
    <select class="form-control" name="session" id="">
    <option value="Select Session">Select Session</option>
    <option value="Day">Day</option>
    <option value="Night">Night</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Vanue Id</label>
    <input type="text" name="vanue_id" class="form-control" id="" placeholder="">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button> 
 </form>
 </div>
</div>






@endsection
