<div>
    @extends('backend.master')

    @section('content')

  <div>
<form action="{{route('personal.form')}}" method="post">
  @csrf

  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="fathersName" class="form-label">Father's Name</label>
    <input type="text" name="fathersName" class="form-control" id="fathersName">
  </div>

  
  <div class="mb-3">
    <label for="mothersName" class="form-label">Mother's Name</label>
    <input type="text" name="mothersName" class="form-control" id="mothersName">
  </div>
  
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <textarea  name="address" class="form-control" id="address"> </textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

    @endsection
</div>
