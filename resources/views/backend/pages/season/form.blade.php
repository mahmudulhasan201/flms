@extends('backend.master')
@section('content')
<div>
  <form action="{{route('season.form')}}" method="post" enctype="multipart/form-data">
    @csrf

    <h1>Season Form</h1>

    <div class="mb-3">
      <label for="description" class="form-label">Season Name</label>
      <input name="name" class="form-control" id="" placeholder="Enter Season Name">
    </div>

    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <select class="form-control" name="status" id="">
        <option value="Select Status">Select Status</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection