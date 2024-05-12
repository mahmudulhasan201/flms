
    @extends('backend.master')
    @section('content')
<div>
 <form action="{{route('league.form')}}" method="post" enctype="multipart/form-data"> 
    @csrf
        <h1>League Form</h1>
  <div class="mb-3">
    <label for="league_name" class="form-label">League Name</label>
    <input name="name" class="form-control" id="" placeholder="Enter league Name">
  </div>

  <div class="mb-3">
    <label for="league_logo" class="form-label">League Logo</label>
    <input type="file" name="league_logo" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="Status" class="form-label">Status</label>
    <input name="status" class="form-control" id="" placeholder="status">
  </div>
 

  <button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>

@endsection
