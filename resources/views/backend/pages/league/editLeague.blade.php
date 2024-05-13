
@extends('backend.master')
    @section('content')
<div>
 <form action="{{route('league.update',$editLeague->id)}}" method="post" enctype="multipart/form-data"> 

 @method('put')
    @csrf
        <h1> Edit League Form</h1>
  <div class="mb-3">
    <label for="league_name" class="form-label">League Name</label> 
    <input value="{{$editLeague->leagueName}}" type="text" name="name" class="form-control" id="" placeholder="Enter league Name">
  </div>

  <div class="mb-3">
    <label for="league_logo" class="form-label">League Logo</label>
    <input value="{{$editLeague->leagueLogo}}" type="file" name="league_logo" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="Status" class="form-label">Status</label>
    <input value="{{$editLeague->status}}" name="status" class="form-control" id="" placeholder="status">
  </div>
 

  <button type="submit" class="btn btn-primary">Update</button>
 </form>
</div>

@endsection
