@extends('backend.master')
@section('content')

<h1>Select Venue</h1>
 <a href="{{route('venue.form')}}" class="btn btn-success">Select venue</a>
   <br><br> 

   <div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Venue Name</th>
      <th scope="col">Venue Location</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
@foreach($venue as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->venueName}}</td>
      <td>{{$data->venueLocation}}</td> 
      <td>
        <a href="" class="btn btn-primary">View</a>
        <a href="" class="btn btn-success">Edit</a> 
        <a href="{{route('venue.delete',$data->id)}}" class="btn btn-danger">Delete</a> 
    <td>
    </tr>
    
@endforeach     

  </tbody>
</table></div>

{{$venue->links()}}

@endsection 
