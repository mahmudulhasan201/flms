@extends('frontend.master')

@section('content')

<div class="content-inner">
    <div class="row" style="margin-top: 20px; margin-bottom:20px; margin-right: 20px;" >

        <div class="col-md-4">
        </div>

        <div class="col-md-4">
            <div class="player-profile" style="background-color: white;">
                <h1 style="color:black;">{{ $player->fullName }}</h1>
                <h5 style="color:black">Email: {{ $player->email }}</h5>
                <h5 style="color:black">Born: {{ $player->born }}</h5>
                <h5 style="color:black">Birth Place: {{ $player->birthPlace }}</h5>
                <h5 style="color:black">Height: {{ $player->height }}</h5>
                <h5 style="color:black">Playing Role: {{ $player->playingRole }}</h5>
                <h5 style="color:black">Batting Style: {{ $player->battingStyle }}</h5>
                <h5 style="color:black">Bowling Style: {{ $player->bowlingStyle }}</h5>
                <h5 style="color:black">Price: {{ $player->price}}</h5>
                <img src="{{url('images/player/',$player->playerImage) }}" alt="{{ $player->fullName }}"><br>

                <td><a href="{{route('editPlayer.profile', $player->id)}}" class="btn btn-primary">Edit Profile</a></td>
            </div>
        </div><br>



        <div class="col-md-4">
            <a class="btn btn-primary mb-3 w-50" href="{{route('player.invitation')}}">Invitations</a>

        </div>
    </div>
</div>


@endsection