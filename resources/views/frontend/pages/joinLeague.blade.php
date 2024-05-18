@extends('frontend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">

            <div class="content-inner">
                <h1>Teams</h1>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Team Owner Name</th>
                        <th scope="col">Team Name</th>
                        <th scope="col">League Name</th>
                        <th scope="col">Season ID</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($varTeam as $key=>$data)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data->team->ownerName}}</td>
                        <td>{{$data->team->teamName}}</td>
                        <td>{{$data->league->leagueName}}</td>
                        <td>{{$data->season->seasonName}}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection