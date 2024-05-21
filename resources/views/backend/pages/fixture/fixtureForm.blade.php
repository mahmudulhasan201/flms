@extends('backend.master')
@section('content')

<div>
  <form action="{{route('fixture.form')}}" method="post" enctype="multipart/form-data">
    @csrf

    <h1>Fixture Form</h1>

    <div class="container">
      <div class="form-group">
        <label for="">League</label>
        <select class="form-control" name="league_id">
          <option value="">Select League</option>
          @foreach($makeFixture as $data)
          <option value="{{$data->id}}">{{$data->leagueName}}</option>
          @endforeach
        </select>
      </div><br>

      <div class="mb-3">
        <label for="home_team_id" class="">Home Team Id</label>
        <select name="home_team_id" class="form-control" id="">
          <option value="">Select Home Team</option>
          @foreach($teamFixture as $data)
          <option value="{{$data->id}}">{{$data->teamName}}</option>
          @endforeach
        </select>
      </div><br>

      <div class="mb-3">
        <label for="away_team_id" class="">Away Team Id</label>
        <select name="away_team_id" class="form-control" id="">
          <option value="">Select Away Team</option>
          @foreach($teamFixture as $data)
          <option value="{{$data->id}}">{{$data->teamName}}</option>
          @endforeach
        </select>
      </div><br>

      <div class="mb-3">
        <label for="session" class="form-label">Session</label>
        <!-- <input type="text" name="session" class="form-control" id="" placeholder=""> -->
        <select class="form-control" name="session" id="">
          <option value="Select Session">Select Session</option>
          <option value="Day">Day</option>
          <option value="Night">Night</option>
        </select>
      </div><br>

      <div class="mb-3">
        <label for="" class="form-label">Date</label>
        <input type="date" name="date" class="form-control" id="" placeholder="">
      </div><br>

      <div class="mb-3">
        <label for="" class="">Venue Id</label>
        <select name="venue_id" class="form-control" id="">
          <option value="">select venue</option>
          @foreach($venueFixture as $data)
          <option value="{{$data->id}}">{{$data->venueName}}</option>
          @endforeach
        </select>
      </div><br>


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