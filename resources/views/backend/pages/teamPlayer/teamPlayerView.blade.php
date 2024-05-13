@extends('backend.master')

@section('content')

<h1>Details</h1>
<p>Team Name: {{$viewTeamPlayer->team->teamName}}</p>
<p>Player Name: {{$viewTeamPlayer->player->fullName}}</p> 

@endsection 