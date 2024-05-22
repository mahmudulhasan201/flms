@extends('frontend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="content-inner">

                <form method="GET" action="{{ route('web.fixture') }}">
                    <div class="form-group">
                        <label for="league">Select League</label>
                        <select name="league_id" id="league" class="form-control" style="background-color:dimgrey; color: #000;" onchange="this.form.submit()">
                            <option value="">Select a league</option>
                            @foreach($leagues as $leagueOption)
                            <option value="{{ $leagueOption->id }}" {{ $selectedLeague == $leagueOption->id ? 'selected' : '' }}>
                                {{ $leagueOption->leagueName }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </form>

                @if($league)
                <!-- Display teams if a league is selected -->
                <h1>{{ $league->leagueName }}</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">date</th>
                            <th scope="col">Home Team</th>
                            <th scope="col">VS</th>
                            <th scope="col">Away Team</th>
                            <th scope="col">Venue</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($matches as $key => $match)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$match->date}}</td>
                            <td>{{$match->homeTeam->teamName}}</td>
                            <td>VS</td>
                            <td>{{$match->awayTeam->teamName}}</td>
                            <td>{{$match->venue->venueName}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection