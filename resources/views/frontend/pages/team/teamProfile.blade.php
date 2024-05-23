@extends('frontend.master')

@section('content')

<div class="content-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Team Name</h1>
                <div class="mt-3">
                    <p><strong>Owner Name:</strong> John Doe</p>
                    <p><strong>Coach Name:</strong> Jane Smith</p>
                    <p><strong>Team Logo:</strong></p>
                    <img src="path/to/logo.jpg" alt="Team Logo" class="img-fluid mb-3" style="max-width: 200px;">
                    <p><strong>Status:</strong> Active</p>
                    <a class="btn btn-primary mt-2" href="#">Edit</a>
                </div>
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