@extends('backend.master')
    @section('content')
<div>
<form action="{{route('teamLeague.form')}}" method="post">
    @csrf

    <h1>Team-League Form</h1>
    
    <div class="mb-3">
    <label for="league_id" class="">League Id</label>
    <select name="league_id" class="form-control" id="">
    <option value="">Select League Name</option>
    @foreach($varLeague as $data)
    <option value="{{$data->id}}">{{$data->leagueName}}</option>  
    @endforeach
    </select>
  </div><br>

    <div class="mb-3">
      <label for="team_id" class="">Team Id</label>
      <select name="team_id" class="form-control" id="">
      <option value="">Select Team Name</option>
      @foreach($varTeam as $data)
      <option value="{{$data->id}}">{{$data->teamName}}</option>  
      @endforeach
      </select>
    </div><br>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div> 

@endsection 

