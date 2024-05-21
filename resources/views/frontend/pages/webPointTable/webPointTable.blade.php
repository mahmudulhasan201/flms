@extends('frontend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
        <div class="content-inner">
                <h1>Point Table</h1><br><br>
                @foreach($groupedByLeague as $leagueName => $teams)
                    <h2>{{ $leagueName }}</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Team Name</th>
                            <th scope="col">M</th>
                            <th scope="col">w</th>
                            <th scope="col">L</th>
                            <th scope="col">PTS</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($teams as $team)
                        <tr>
                            <td>{{$team->team->teamName}}</td>
                            <td>{{$team->match}}</td>
                            <td>{{$team->win}}</td>
                            <td>{{$team->lose}}</td>
                            <td>{{$team->points}}</td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection