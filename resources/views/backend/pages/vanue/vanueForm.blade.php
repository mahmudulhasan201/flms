@extends('backend.master')
@section('content')

<div>
 <form action="{{route('vanue.form')}}" method="post" enctype="multipart/form-data"> 
    @csrf
  <h1>VANUE</h1>       
  <div class="mb-3">
    <label for="vanue_name" class="form-label">Vanue Name</label>
    <input type="text" name="vanue_name" class="form-control" id="" placeholder="Enter Vanue Name">
  </div>

  <div class="mb-3">
    <label for="vanue_location" class="form-label">Vanue Location</label>
    <input type="text" name="vanue_location" class="form-control" id="" placeholder="Enter Vanue Location">
  </div>



  <button type="submit" class="btn btn-primary">Submit</button> 
 </form>
</div>
 
@endsection