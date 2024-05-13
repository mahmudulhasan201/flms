@extends('backend.master')

@section('content')

<h1>Details</h1>

<p>ID: {{ $viewLeague->id}}</p>
<p>League Name: {{ $viewLeague->leagueName}}</p>
<p>League Logo:</p> <img width="100" src="{{url('/images/league', $viewLeague->leagueLogo)}}" alt="">
<p>Status:{{$viewLeague->status}}</p>



@endsection 