@extends("frontend.master")

@section('content')

<div class="content-inner">

    



    <div style="margin-right:50px; ">
    <h1><strong> Player List</strong></h1>
        <table class="table table-striped table-dark" style="background-color: white;">
            <thead>
                <tr style="color: black; font-size: 20px; ">
                    <th scope="col">ID</th>
                    <th scope="col">Player Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Born</th>
                    <th scope="col">Birth Place</th>
                    <th scope="col">Height (m)</th>
                    <th scope="col">Playing Role</th>
                    <th scope="col">Batting style</th>
                    <th scope="col">Bowling Style</th>
                    <th scope="col">Asking Price</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody style="color: black;  font-size: 17px;">
                <tr>
                    @foreach($data as $key=> $player)

                    <td>{{$key + 1}}</td>
                    <td>{{$player->fullName}}</td>
                    <td>{{$player->email}}</td>
                    <td>{{$player->born}}</td>
                    <td>{{$player->birthPlace}}</td>
                    <td>{{$player->height}}</td>
                    <td>{{$player->playingRole}}</td>
                    <td>{{$player->battingStyle}}</td>
                    <td>{{$player->bowlingStyle}}</td>
                    <td>{{$player->price}}</td>
                    <td><img width="100" src="{{url('images/player',$player->playerImage)}}" alt=""></td>

                    <td>
                        <a href="{{route('add.player',$player->id)}}" class="btn btn-primary">Recruit</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{$data->links()}}
@endsection