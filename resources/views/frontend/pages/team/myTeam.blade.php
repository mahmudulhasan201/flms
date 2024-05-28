@extends('frontend.master')

@section('content')

<div class="content-inner">

</div>
<div style="margin-left: 200px; margin-right:200px;">
    <h1><strong>Teams</strong></h1>
    <table class="table table-bordered" style="background-color: white;">
        <thead>
            <tr style="color: black; font-size: 25px; ">
                <th scope="col">Serial</th>
                <th scope="col">Player ID</th>
                <th scope="col">Player Name</th>
                <th scope="col">Player Role</th>
                <th scope="col">Coach Name</th>
            </tr>
        </thead>

        <tbody>
            @php
            $lastTeamId = null;
            @endphp
            @foreach($data as $key=> $player)
            <tr style="color: black;  font-size: 20px;">

                <td>{{$key+1}}</td>
                <td>{{$player->player->id}}</td>
                <td>{{$player->player->fullName}}</td>
                <td>{{$player->player->playingRole}}</td>
                <td>
                    @if($lastTeamId !== $player->team->id)
                    {{ $player->team->coachName }}
                    @php
                    $lastTeamId = $player->team->id;
                    @endphp
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection