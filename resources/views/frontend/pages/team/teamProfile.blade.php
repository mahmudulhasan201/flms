@extends('frontend.master')

@section('content')

<div class="content-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="background-color: white;">

                <h1 style="color: black;"><strong>{{ $team->teamName }}</strong></h1>
                <div class="mt-3">
                    <div class="team-details" style="color: black;">
                        <p><strong>Coach Name:</strong> {{ $team->coachName }}</p>
                        <p><strong>Owner Name:</strong> {{ $team->ownerName }}</p>
                        <p><strong>Owner Email:</strong> {{ $team->ownerEmail }}</p>
                        <img src="{{ url('images/team', $team->teamLogo) }}" alt="{{ $team->teamName }} Logo" style="width: 200px; height: 200px">
                        <p><strong>Status:</strong> {{ $team->status }}</p>
                    </div>
                    <a class="btn btn-primary mt-2" href="{{route('editTeam.profile',$team->id)}}">Edit</a>
                </div><br>
            </div>
            <div class="col-md-4">
                <div class="d-flex flex-column align-items-start">
                    <ul>
                        <li><a class="btn btn-primary mb-3 w-100" href="{{ route('myTeam') }}">My Team</a></li>
                        <li><a class="btn btn-primary mb-3 w-100" href="{{route('team.invitation')}}">Invitations</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection