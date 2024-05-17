@extends('frontend.master')

@section('content')

<div class="content-inner">
   
</div>
<div style="margin-left: 200px; margin-right:200px;">
<h1>Teams</h1>
<table class="table table-bordered" style="background-color: DarkOliveGreen;">
    <thead>
        <tr style="color: black; font-size: 25px; " >
            <th scope="col">Player ID</th>
            <th scope="col">Player Name</th>
            <th scope="col">Player Role</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $player)
        <tr  style="color: white;  font-size: px;" >

            <td >{{$player->player->id}}</td>
            <td  >{{$player->player->fullName}}</td>
            <td >{{$player->player->playingRole}}</td>

        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection