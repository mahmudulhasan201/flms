@extends('frontend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="content-inner">

                <form method="GET" action="{{ route('view.teamList') }}">
                    <div class="form-group" style="color:white; font-size:40px;">
                        <h1 for="league"><strong>Select League</strong> </h1>
                        <select name="league_id" id="league" class="form-control" style="background-color:white;" onchange="this.form.submit()">
                            <option style="font-size: 20px;" value="">Select a league</option>
                            @foreach($leagues as $leagueOption)
<<<<<<< HEAD
                            <option style="font-size: 20px;" value="{{ $leagueOption->id }}" {{ $selectedLeague == $leagueOption->id ? 'selected' : '' }}>
                                {{ $leagueOption->leagueName }}
=======
                            <option value="{{ $leagueOption->id }}" {{ $selectedLeague == $leagueOption->id ? 'selected' : '' }}>
                                {{ $leagueOption->leagueName }} {{ $leagueOption->season->seasonName }}
>>>>>>> 0b6747748eca0a186930b700728df8492e98781c
                            </option>
                            @endforeach
                        </select>
                    </div>
                </form>

                @if($league)
                <!-- Display teams if a league is selected -->
                <h1><strong>{{ $league->leagueName }}</strong></h1>
                <table class="table table-bordered" style="background-color: white;">
                    <thead>
                        <tr style="color: black; font-size: 20px">
                            <th scope="col">Serial</th>
                            <th scope="col">Team Name</th>
                            <th scope="col">Team Owner Name</th>
                            <th scope="col">Team Coach Name</th>
                            <th scope="col">Season</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($teams as $key => $team)
                        <tr style="color: black; font-size: 20px">
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