@extends('backend.master')

@section('content')

<h1>Details</h1>

<p>ID: {{ $player->id}}</p>
<p>player Name: {{ $player->fullName}}</p>
<p>Born: {{ $player->born}}</p>
<p>Birth Place: {{ $player->birthPlace}}</p>
<p>player Height: {{ $player->height}}</p>
<p>Playing Role: {{ $player->playingRole}}</p>
<p>Batting Style: {{ $player->battingStyle}}</p>
<p>Bowling Style: {{ $player->bowlingStyle}}</p>
<p>Player Price: {{ $player->price}}</p>
<p>Image:</p> <img width="100" src="{{url('/images/player', $player->playerImage)}}" alt="">


@endsection 