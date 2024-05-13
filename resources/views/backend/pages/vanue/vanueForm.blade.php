@extends('backend.master')
@section('content')

<div>
 <form action="{{route('venue.form')}}" method="post" enctype="multipart/form-data"> 
    @csrf
  <h1>VENUE Form</h1>       
  <div class="mb-3">
    <label for="venue_name" class="form-label">Venue Name</label>
    <input type="text" name="venue_name" class="form-control" id="" placeholder="Enter Venue Name">
  </div>

  <div class="mb-3">
    <label for="vanue_location" class="form-label">Venue Location</label>
    <input type="text" name="venue_location" class="form-control" id="" placeholder="Enter Venue Location">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>  
 </form>
</div>
 
@endsection