@extends('backend.master')

@section('content')

<h1>Details</h1>

<p>ID: {{ $viewTeam->id}}</p>
<p>Team Name: {{$viewTeam->teamName}}</p>
<p>Coach Name: {{$viewTeam->coachName}}</p>  
<p>Owner Name: {{$viewTeam->ownerName}}</p>  
<p>Owner Email: {{$viewTeam->ownerEmail}}</p>   
<p>Team Logo: <img width="100" src="{{url('images/team',$viewTeam->teamLogo)}}" alt=""></p> 


@endsection 