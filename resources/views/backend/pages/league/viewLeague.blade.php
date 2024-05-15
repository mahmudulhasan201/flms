@extends('backend.master')

@section('content')

<h1>Details</h1>

<p>ID: {{ $viewLeague->id}}</p>
<p>League Name: {{ $viewLeague->leagueName}}</p>
<p>Starting Date: {{ $viewLeague->starting_date}}</p>
<p>Ending Date: {{ $viewLeague->ending_date}}</p>
<p>Number Of Teams: {{ $viewLeague->numberOfTeams}}</p>
<p>Season: {{ $viewLeague-> season->seasonName}}</p>
<p>League Logo:</p> <img width="100" src="{{url('/images/league', $viewLeague->leagueLogo)}}" alt="">
<p>Status:{{$viewLeague->status}}</p>



@endsection 