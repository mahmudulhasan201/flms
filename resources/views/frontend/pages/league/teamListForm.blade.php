@extends('frontend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="content-inner">

                <!-- Form for selecting league -->
                <form method="GET" action="{{ route('view.teamList') }}">
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
                            <th scope="col">Team Name</th>
                            <th scope="col">Team Owner Name</th>
                            <th scope="col">Team Coach Name</th>
                            <th scope="col">Season</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($teams as $key => $team)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $team->team->teamName }}</td>
                            <td>{{ $team->team->ownerName }}</td>
                            <td>{{ $team->team->coachName }}</td>
                            <td>{{ $team->season->seasonName }}</td>
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