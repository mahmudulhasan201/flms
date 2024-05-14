@extends('backend.master')
@section('content')

<div>
 <form action="{{route('venue.update',$editVenue->id)}}" method="post" enctype="multipart/form-data"> 
    @csrf
    @method('put')

  <h1> Edit Venue Form</h1>  
       
  <div class="mb-3">
    <label for="venue_name" class="form-label">Venue Name</label>  
    <input value="{{$editVenue->venueName}}" type="text" name="venue_name" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="vanue_location" class="form-label">Venue Location</label>
    <input value="{{$editVenue->venueLocation}}" type="text" name="venue_location" class="form-control" id="" placeholder="">
  </div>



  <button type="submit" class="btn btn-primary">Update</button>  
 </form>
</div>
 
@endsection