@extends('frontend.master')

@section('content')


<div class="container">
    <div class="row">
        <div class="col">
        <div class="content-inner" style="">
                <h1><strong>Point Table</strong></h1><br><br>
                @foreach($groupedByLeague as $leagueName => $teams)
                    <h2 style="font-size: 40px;"><strong>{{ $leagueName }}</strong></h2>
                <table class="table table-striped" style="background-color: white; font-size: 25px;">
                    <thead>
                        <tr style="color: black;">
                            <th scope="col">Team Name</th>
                            <th scope="col">M</th>
                            <th scope="col">w</th>
                            <th scope="col">L</th>
                            <th scope="col">PTS</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($teams as $team)
                        <tr style="color: black; font-size: 20px;" >
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