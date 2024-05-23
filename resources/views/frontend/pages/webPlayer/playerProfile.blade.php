@extends('frontend.master')

@section('content')

<div class="content-inner">
    <div class="row" style="margin-top: 20px; margin-bottom:20px;">

        <div class="col-md-4">
        </div>


        <div class="player-profile">
            <h1>{{ $player->fullName }}</h1>
            <p>Email: {{ $player->email }}</p>
            <p>Born: {{ $player->born }}</p>
            <p>Birth Place: {{ $player->birthPlace }}</p>
            <p>Height: {{ $player->height }}</p>
            <p>Playing Role: {{ $player->playingRole }}</p>
            <p>Batting Style: {{ $player->battingStyle }}</p>
            <p>Bowling Style: {{ $player->bowlingStyle }}</p>    
            <img src="{{url('images/player/',$player->playerImage) }}" alt="{{ $player->fullName }}"><br>

            <td><a href="{{route('editPlayer.profile', $player->id)}}" class="btn btn-primary">Edit Profile</a></td>
        </div>



        <div class="col-md-4">
        </div>
    </div>
</div>


@endsection