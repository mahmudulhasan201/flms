@extends('backend.master')
@section('content')

<div>
 <form action="{{route('fixture.update',$editFixture->id)}}" method="post" enctype="multipart/form-data"> 
    @csrf
    @method('put')

    <h1>Edit Fixture Form</h1>

 <div class="container">
<div class="form-group">
  <label for="">League</label>
  <select class="form-control" name="league_id" >
    <option value="">{{$editFixture->league->leagueName}}</option>
    @foreach($league as $data)
    <option value="{{$data->id}}">{{$data->leagueName}}</option>
    @endforeach
  </select>
</div>


<div class="mb-3">
    <label for="home_team_id" class="">Home Team Id</label>
    <select name="home_team_id" class="form-control" id="">
    <option value="">{{$editFixture->homeTeam->teamName}}</option>
    @foreach($team as $data)
    <option value="{{$data->id}}">{{$data->teamName}}</option>
    @endforeach
    </select>
  </div>


  <div class="mb-3">
    <label for="away_team_id" class="">Home Team Id</label>
    <select name="away_team_id" class="form-control" id="">
    <option value="">{{$editFixture->awayTeam->teamName}}</option>
    @foreach($team as $data)
    <option value="{{$data->id}}">{{$data->teamName}}</option>
    @endforeach
    </select>
  </div>


  <div class="mb-3">
    <label for="session" class="form-label">Session</label>
    <!-- <input type="text" name="session" class="form-control" id="" placeholder=""> -->
    <select class="form-control" name="session" id="">
    <option value="Select Session">{{$editFixture->session}}</option> 
    <option value="Day">Day</option>
    <option value="Night">Night</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Date</label>
    <input value="{{$editFixture->date}}" type="date" name="date" class="form-control" id="" placeholder="">
  </div>

  <div class="mb-3">
    <label for="" class="">Venue Id</label>
    <select name="venue_id" class="form-control" id="">
    <option value="">{{$editFixture->venue->venueName}}</option>
    @foreach($venue as $data)
    <option value="{{$data->id}}">{{$data->venueName}}</option>
    @endforeach
    </select>
  </div>



  <button type="submit" class="btn btn-primary">Submit</button> 
 </form>
 </div>
</div>

@endsection