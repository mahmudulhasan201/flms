@extends('frontend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
        <div class="content-inner">
                <h1>Point Table</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">League Name</th>
                            <th scope="col">Team Name</th>
                            <th scope="col">M</th>
                            <th scope="col">w</th>
                            <th scope="col">L</th>
                            <th scope="col">PTS</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($varPointTable as $data)
                        <tr>
                            <td>{{$data->league->leagueName}}</td>
                            <td>{{$data->team->teamName}}</td>
                            <td>{{$data->match}}</td>
                            <td>{{$data->win}}</td>
                            <td>{{$data->lose}}</td>
                            <td>{{$data->points}}</td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection