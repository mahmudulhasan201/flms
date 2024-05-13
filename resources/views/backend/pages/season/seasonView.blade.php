@extends('backend.master')

@section('content')

<h1>Details</h1>

<p>ID: {{ $viewSeason->id}}</p>
<p>Season Name: {{$viewSeason->seasonName}}</p>
<p>Status: {{$viewSeason->status}}</p>   


@endsection 