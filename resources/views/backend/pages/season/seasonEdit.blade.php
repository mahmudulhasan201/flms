@extends('backend.master')
    @section('content')
<div>
    <h1> Edit Season Form</h1>
<form action="{{route('season.update',$editSeason->id )}}" method="post" enctype="multipart/form-data">

    @csrf
    @method('put')
       
  <div class="mb-3">
    <label for="description" class="form-label">Season Name</label>
    <input value="{{$editSeason->seasonName}}" name="name" class="form-control" id="" placeholder="Enter Season Name">
  </div>

  <div class="mb-3">
    <label for="Status" class="form-label">Status</label>
    <input value="{{$editSeason->status}}" name="status" class="form-control" id="" placeholder="status">
  </div>

  <button type="update" class="btn btn-primary">Update</button>
</form> 
</div> 

@endsection 

