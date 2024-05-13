@extends("backend.master")

@section('content')
   
<h1> Season </h1>

<a href="{{route('season.form')}}" class="btn btn-success">Create season</a>
 


<br><br>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Season Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach($data as $season)

    <tr>
      <th>{{$season->id}}</th> 
      <td>{{$season->seasonName}}</td> 
      <td>{{$season->status}}</td> 
      <td>
        <a href="{{route('season.view', $season->id)}}" class="btn btn-primary">View</a>
        <a href="{{route('season.edit',$season->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('season.delete',$season->id)}}" class="btn btn-danger">Delete</a> 
      </td> 
    </tr>

    @endforeach
  </tbody>
</table>
@endsection 
