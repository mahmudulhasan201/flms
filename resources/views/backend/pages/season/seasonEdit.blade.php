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
        <label for="status" class="form-label">Status</label>
        <select class="form-control" name="status" id="">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div>

  <button type="update" class="btn btn-primary">Update</button>
</form> 
</div> 

@endsection 

