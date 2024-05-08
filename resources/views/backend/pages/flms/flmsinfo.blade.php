<div>
    @extends('backend.master')

    @section('content')

  <div>
<form action="{{route('flms.start')}}" method="post">
  @csrf

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input required type="text" name="name" class="form-control" id="" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="fathersName" class="form-label">Father's Name</label>
    <input required type="text" name="fathersName" class="form-control" id="">
  </div>

  
  <div class="mb-3">
    <label for="mothersName" class="form-label">Mother's Name</label>
    <input required type="text" name="mothersName" class="form-control" id="">
  </div>
  
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea  name="address" class="form-control" id=""> </textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

    @endsection
</div>
