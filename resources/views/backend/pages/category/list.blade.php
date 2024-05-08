
@extends("backend.master")


@section('content')

<h1>Category List</h1>


<a href="{{route('category.form')}}" class="btn btn-success">Create new category</a>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

<tbody>

@foreach($categories as $data)
<tr>
      <th scope="col">{{$data->id}}</th>
      <td>{{$data->categoryName}}</td>
      <td>{{$data->descriotion}}</td>
      <td><img style="width: 100px;height:100px" src="{{url('images/categories', $data->image)}}" 
    alt="" srcset="">  </td>
      <!-- <td>{{$data->minimum_price}}</td>
      <td>{{$data->description}}</td> -->
      <td>
        <a class="btn btn-info" href="">Edit</a>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-danger" href="">Delete</a>
      
</tr>

@endforeach
</tbody>
</table>

{{$categories->links()}}
@endsection 