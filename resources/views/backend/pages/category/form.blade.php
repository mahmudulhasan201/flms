<div>
    @extends('backend.master')
    @section('content')
<div>
<form action="{{route('category.form')}}" method="post" enctype="multipart/form-data">
    @csrf

<div class="mb-3">
    <label for="categoryname" class="form-label">Category Name</label>
    <input required type="text" name="categoryName" class="form-control" id="" aria-describedby="" placeholder="Enter category name">
    </div>

   
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <input name="description" class="form-control" id="description" placeholder="Description">
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Upload Image</label>
    <input name="image" type="file" class="form-control" id="" placeholder="Upload an image"> 
    
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection
</div>
