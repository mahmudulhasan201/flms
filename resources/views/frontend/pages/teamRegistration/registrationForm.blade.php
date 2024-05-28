@extends('frontend.master')
@section('content')

<div class="content-inner" style="padding-left: 500px; padding-bottom: 200px">
  <div class="row">

    <div class="col-md-2">
    </div>

    <div class="col-md-8" style="background-color:white; border:2px solid black; padding:10px; border-radius:15px; ">

      <form action="{{route('do.registration')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h2 style="color: black;"><strong>Team Owner Registration Form</strong></h2><br>

        <div class="form-group" >
        <h5 style="color: black; font-size:20px ;" for="">Team Name</h5> 
          <input style="border:1px solid black;" type="text" name="team_name" class="form-control" id="" placeholder="">
        </div>

        <div class="form-group" style="color: black;">
        <h5 style="color: black; font-size:20px ;" for="team_logo"> Team Logo</h5> 
          <input style="border:1px solid black;" type="file" name="team_logo" class="form-control" id="team_logo" placeholder="">
        </div>

        <div class="form-group" style="color: black;">
        <h5 style="color: black; font-size:20px ;" for="">Coach Name</h5> 
          <input style="border:1px solid black;" name="coach_name" type="text" class="form-control" id="" placeholder="">
        </div>

        <div class="form-group" style="color: black;">
        <h5 style="color: black; font-size:20px ;" for="">Owner Name</h5> 
          <input style="border:1px solid black;" name="owner_name" type="text" class="form-control" id="" placeholder="">
        </div>

        <div class="form-group" style="color: black;">
        <h5 style="color: black; font-size:20px ;" for="">Owner Email address</h5> 
          <input style="border:1px solid black;" name="owner_email" type="email" class="form-control" id="" placeholder="">
        </div>

        <div class="form-group" style="color: black;">
        <h5 style="color: black; font-size:20px ;" for="">Password</h5> 
          <input style="border:1px solid black;" name="password" type="password" class="form-control" id="" placeholder="">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <div class="col-md-2">
    </div>

  </div>
</div>

@endsection