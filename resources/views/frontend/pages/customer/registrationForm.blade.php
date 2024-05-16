@extends('frontend.master')
@section('content')


<div class="row" style="margin-top: 20px; margin-bottom:20px;">

<div class="col-md-3">
</div>

<div class="col-md-6" style="border:2px solid black; padding:10px; border-radius:15px;">

<form action="{{route('do.registration')}}" method="post">
@csrf

<div class="form-group">
    <label for=""> Team Name</label>
    <input type="text" name="team_name" class="form-control" id=""  placeholder="">
  </div>

  <div class="form-group">
    <label for=""> Team Logo</label>
    <input type="file" name="team_logo" class="form-control" id=""  placeholder="">
  </div>

  <div class="form-group">
    <label for="">Coach Name</label>
    <input name="coach_name" type="text" class="form-control" id="" placeholder="">
  </div>

  <div class="form-group">
    <label for="">Owner Name</label>
    <input name="owner_name" type="text" class="form-control" id="" placeholder="">
  </div>

  <div class="form-group">
    <label for="">Owner Email address</label>
    <input name="owner_email" type="email" class="form-control" id="" placeholder="Enter email">
  </div>
  
  <div class="form-group">
    <label for="">Password</label>
    <input name="password" type="password" class="form-control" id="" placeholder="Enter Password">
  </div>


  <div class="form-group">
    <label for="">Status</label>
    <input name="status" type="text" class="form-control" id="" placeholder="">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<div class="col-md-3">
</div>

</div>


@endsection