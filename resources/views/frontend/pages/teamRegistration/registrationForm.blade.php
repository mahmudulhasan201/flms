@extends('frontend.master')
@section('content')

<div class="content-inner" style="padding-left: 500px; padding-bottom: 200px">
  <div class="row">

    <div class="col-md-2">
    </div>

    <div class="col-md-8" style="border:2px solid black; padding:10px; border-radius:15px;">

      <form action="{{route('do.registration')}}" method="post">
        @csrf
        <h2>Team Owner Registration Form</h2><br>

        <div class="form-group" style="color: white;">
          <label for=""> Team Name</label>
          <input type="text" name="team_name" class="form-control" id="" placeholder="">
        </div>

        <div class="form-group" style="color: white;">
          <label for=""> Team Logo</label>
          <input type="file" name="team_logo" class="form-control" id="" placeholder="">
        </div>

        <div class="form-group" style="color: white;">
          <label for="">Coach Name</label>
          <input name="coach_name" type="text" class="form-control" id="" placeholder="">
        </div>

        <div class="form-group" style="color: white;">
          <label for="">Owner Name</label>
          <input name="owner_name" type="text" class="form-control" id="" placeholder="">
        </div>

        <div class="form-group" style="color: white;">
          <label for="">Owner Email address</label>
          <input name="owner_email" type="email" class="form-control" id="" placeholder="Enter email">
        </div>

        <div class="form-group" style="color: white;">
          <label for="">Password</label>
          <input name="password" type="password" class="form-control" id="" placeholder="Enter Password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <div class="col-md-2">
    </div>

  </div>
</div>

@endsection