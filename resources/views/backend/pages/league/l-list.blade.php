@extends("backend.master")

@section('content')
   
<h1>League List</h1>

<a href="{{route('league.form')}}" class="btn btn-success">Create League List</a>
 
<br><br>

<div>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">League Name</th>
      <th scope="col">League Logo</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
@foreach($data as $league)
    <tr>
      <td>{{$league->id}}</td>
      <td>{{$league->leagueName}}</td>
      <td><img style="width: 75px; height: 75px " src="{{url('images/league',$league->leagueLogo)}}"  alt=""></td>
      <td>{{$league->status}}</td>
      <td>
        <a href="" class="btn btn-primary">View</a>
        <a href="" class="btn btn-success">Edit</a> 
        <a href="" class="btn btn-danger">Delete</a> 
    <td>
    </tr>
    
@endforeach     

  </tbody>
</table></div>

{{$data->links()}}

@endsection 