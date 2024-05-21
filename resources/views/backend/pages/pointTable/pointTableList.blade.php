@extends("backend.master")

@section('content')


<br>   
<h1>Point Table List</h1>

<a href="{{route('pointTable.form')}}" class="btn btn-success">Create player List</a><br><br>
 
 <div>
 <table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">ID</th> 
      <th scope="col">League Name</th>
      <th scope="col">Team Name</th>
      <th scope="col">Match</th>
      <th scope="col">win</th>
      <th scope="col">Lose</th>
      <th scope="col">Points</th>
      <th scope="col">Status</th> 
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach($makePointTable as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->league->leagueName}}</td>
      <td>{{$data->team->teamName}}</td>
      <td>{{$data->match}}</td>
      <td>{{$data->win}}</td>
      <td>{{$data->lose}}</td>
      <td>{{$data->points}}</td>
      <td>{{$data->status}}</td>
      <td>
        <a href="" class="btn btn-primary">View</a>
        <a href="{{route('pointTable.edit',$data->id)}}" class="btn btn-success">Edit</a>
        <a href="{{route('pointTable.delete',$data->id)}}" class="btn btn-danger">Delete</a>  
      </td>
    </tr>

@endforeach

  </tbody>
</table>
 </div>


@endsection  