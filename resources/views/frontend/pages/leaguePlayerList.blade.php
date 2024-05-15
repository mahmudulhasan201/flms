@extends("frontend.master")

@section('content')

<div class="content-inner">

    <h1>Player List</h1>



    <div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Player Name</th>
                    <th scope="col">Born</th>
                    <th scope="col">Birth Place</th>
                    <th scope="col">Height (m)</th>
                    <th scope="col">Playing Role</th>
                    <th scope="col">Batting style</th>
                    <th scope="col">Bowling Style</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($data as $player)

                    <td>{{$player->id}}</td>
                    <td>{{$player->fullName}}</td>
                    <td>{{$player->born}}</td>
                    <td>{{$player->birthPlace}}</td>
                    <td>{{$player->height}}</td>
                    <td>{{$player->playingRole}}</td>
                    <td>{{$player->battingStyle}}</td>
                    <td>{{$player->bowlingStyle}}</td>
                    <!-- <td><img width="100" src="{{url('images/player',$player->playerImage)}}" alt=""></td> -->
                    <td><img width="100" src="{{url($player->playerImage)}}" alt=""></td>
                    <td>
                        <a href="{{route('player.edit',$player->id)}}" class="btn btn-primary">Recruit</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{$data->links()}}
@endsection