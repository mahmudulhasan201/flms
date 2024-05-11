@extends('backend.master')
    @section('content')
<div>
<form action="{{route('season.form')}}" method="post" enctype="multipart/form-data">
    @csrf
       
  <div class="mb-3">
    <label for="description" class="form-label">Season Name</label>
    <input name="name" class="form-control" id="" placeholder="Enter Season Name">
  </div>

  <div class="mb-3">
    <label for="Status" class="form-label">Status</label>
    <input name="status" class="form-control" id="" placeholder="status">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div> 

@endsection 

