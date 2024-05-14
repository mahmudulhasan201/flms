@extends('backend.master')

@section('content')

<h1>Details</h1>

<p>League Name: {{ $viewFixture->league->leagueName}}</p>
<p>Home Team ID: {{ $viewFixture->homeTeamId}}</p>
<p>Away Team ID: {{ $viewFixture->awayTeamId}}</p>
<p>Session: {{ $viewFixture->session}}</p>
<p>Date: {{ $viewFixture->date}}</p>
<p>Venue Name: {{ $viewFixture->venue->venueName}}</p>  


@endsection