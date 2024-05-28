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
        <select class="form-control" name="league_id">
          <option value="{{$editFixture->leagueId}}">{{$editFixture->league->leagueName}}</option>
          @foreach($league as $data)
          <option value="{{$data->id}}">{{$data->leagueName}}</option>
          @endforeach
        </select>
      </div>


      <div class="mb-3">
        <label for="home_team_id" class="">Home Team Id</label>
        <select name="home_team_id" class="form-control" id="">
          <option value="{{$editFixture->homeTeamId}}">{{$editFixture->homeTeam->teamName}}</option>
          @foreach($team as $data)
          <option value="{{$data->id}}">{{$data->teamName}}</option>
          @endforeach
        </select>
      </div>


      <div class="mb-3">
        <label for="away_team_id" class="">Away Team Id</label>
        <select name="away_team_id" class="form-control" id="">
          <option value="{{$editFixture->awayTeamId}}">{{$editFixture->awayTeam->teamName}}</option>
          @foreach($team as $data)
          <option value="{{$data->id}}">{{$data->teamName}}</option>
          @endforeach
        </select>
      </div>


      <div class="mb-3">
        <label for="session" class="form-label">Session</label>
        <select class="form-control" name="session" id="">
          <option value="{{$editFixture->session}}">{{$editFixture->session}}</option>
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
          <option value="{{$editFixture->venue_id}}">{{$editFixture->venue->venueName}}</option>
          @foreach($venue as $data)
          <option value="{{$data->id}}">{{$data->venueName}}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label for="home_score">{{$editFixture->homeTeam->teamName}} Score</label>
        <input class="form-control" type="number" id="home_score" name="home_team_score" placeholder="Add Number" value="{{$editFixture->home_team_score}}">
      </div>
      <div>
        <label for="away_score">{{$editFixture->awayTeam->teamName}} Score</label>
        <input class="form-control" type="number" name="away_team_score" placeholder="Add Number" value="{{$editFixture->away_team_score}}">
      </div>



      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-control" name="status" id="">
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div>



      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>

@endsection