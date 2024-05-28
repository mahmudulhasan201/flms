@extends('frontend.master')

@section('content')

<div class="content-inner">
    <div class="container">
        <h1><strong>Invitation</strong></h1>
        @if($invitations)
        <table class="table table-bordered" style="background-color:white;">
            <thead>
                <tr style="color: black; font-size: 25px; ">
                    <th scope="col">Serial</th>
                    <th scope="col">Team Name</th>
                    <th scope="col">Player Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($invitations as $key=>$reqs)
                <tr style="color: black;  font-size: 20px;">

                    <td>{{$key+1}}</td>
                    <td>{{$reqs->team->teamName}}</td>
                    <td>{{$reqs->player->fullName}}</td>
                    <td>{{$reqs->status}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('deleteTeam.invitation',$reqs->id)}}">Delete</a>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        @else
        <p>NO Invitation Sent</p>
        @endif
    </div>
</div>





@endsection