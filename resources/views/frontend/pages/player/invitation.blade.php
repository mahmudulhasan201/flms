@extends('frontend.master')

@section('content')

<div class="content-inner">
    <div class="container">
        <table class="table table-bordered" style="background-color:cadetblue;">
            <thead>
                <tr style="color: black; font-size: 25px; ">
                    <th scope="col">Serial</th>
                    <th scope="col">Team Name</th>
                    <th scope="col">Player Name</th>
                    <!-- <th scope="col">Message</th> -->
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($invitations as $key=>$reqs)
                <tr style="color: white;  font-size: px;">

                    <td>{{$key+1}}</td>
                    <td>{{$reqs->team->teamName}}</td>
                    <td>{{$reqs->player->fullName}}</td>
                    <td>{{$reqs->status}}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{route('player.accept', $reqs->team_id)}}">Accept</a>
                        <a class="btn btn-primary" href="{{route('player.reject', $reqs->team_id)}}">Reject</a>
                    </td>
                    @endforeach
                </tr>
            </tbody>
        </table>

    </div>
</div>





@endsection