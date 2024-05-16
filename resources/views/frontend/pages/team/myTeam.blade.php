@extends('frontend.master')

@section('content')

<div class="content-inner">
    <h1>Teams</h1>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Player ID</th>
            <th scope="col">Player Name</th>
            <th scope="col">Player Role</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $player)
        <tr>

            <td>{{$player->player->id}}</td>
            <td>{{$player->player->fullName}}</td>
            <td>{{$player->player->playingRole}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection