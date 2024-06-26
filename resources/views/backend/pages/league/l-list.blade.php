@extends("backend.master")

@section('content')
   
<h1>League List</h1>

<a href="{{route('league.form')}}" class="btn btn-success">Create League List</a>
 
<br><br>

<div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">League Name</th>
      <th scope="col">Season</th>
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
      <td>{{$league->season->seasonName}}</td>
      <td><img style="width: 75px; height: 75px " src="{{url('images/league',$league->leagueLogo)}}"  alt=""></td>
      <td>{{$league->status}}</td>
      <td>
        <a href="{{route('league.view', $league->id)}}" class="btn btn-primary">View</a>
        <a href="{{route('league.edit', $league->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('league.delete',$league->id)}}" class="btn btn-danger">Delete</a>
    <td>
    </tr>
    
@endforeach     
  </tbody>
</table></div>

{{$data->links()}}

@endsection 