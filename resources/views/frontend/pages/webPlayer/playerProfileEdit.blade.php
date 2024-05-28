@extends('frontend.master')

@section('content')


<div class="content-inner">
    <div class="row" style="margin-top: 20px; margin-bottom:20px;">

        <div class="col-md-4">
        </div>

        <div class="col-md-4" style="background-color: white; color:black">
            <form action="{{route('updatePlayer.profile',$player->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                
                <h1 style="color: black;"><strong>Edit Player Profile</strong> </h1>
                <div class="form-group">
                    <label for="Player Name" class="form-label">Player Name</label>
                    <input style="border:1px solid black" value="{{$player->fullName}}" type="text" name="player_name" class="form-control" id="" placeholder="Enter Player Name">
                </div>

                <div class="form-group">
                    <label for="Player Email" class="form-label">Player Email</label>
                    <input style="border:1px solid black" value="{{$player->email}}" type="email" name="player_email" class="form-control" id="" placeholder="Enter Email Address">
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input style="border:1px solid black" value="{{$player->password}}" type="password" name="player_password" class="form-control" id="" placeholder="Enter Password">
                </div>

                <div class="form-group">
                    <label for="Born" class="form-label">Born</label>
                    <input style="border:1px solid black" value="{{$player->born}}" type="date" name="born" class="form-control" id="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="Birth Place" class="form-label">Birth Place</label>
                    <input style="border:1px solid black" value="{{$player->birthPlace}}" type="text" name="birth_place" class="form-control" id="" placeholder="Enter Birth Place">
                </div>

                <div class="form-group">
                    <label for="height" class="form-label">Height (m)</label>
                    <input style="border:1px solid black" value="{{$player->height}}" type="number" name="height" class="form-control" id="height" placeholder="Enter your height in meters" min="0.5" max="3" step="0.01" required>
                </div>


                <div class="form-group">
                    <label for="Playing Role" class="form-label">Playing Role</label>
                    <input style="border:1px solid black" value="{{$player->playingRole}}" type="text" name="playing_role" class="form-control" id="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="Batting style" class="form-label">Batting style</label>
                    <input style="border:1px solid black" value="{{$player->battingStyle}}" type="text" name="batting_style" class="form-control" id="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="Bowling Style" class="form-label">Bowling Style</label>
                    <input style="border:1px solid black" value="{{$player->bowlingStyle}}" type="text" name="bowling_style" class="form-control" id="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="price" class="form-label">Asking Price</label>
                    <input style="border:1px solid black" value="{{$player->price}}" type="number" name="price" class="form-control" id="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="Photo" class="form-label">Player Image</label>
                    <input style="border:1px solid black" value="" type="file" name="photo" class="form-control" id="" placeholder="">
                </div>

                <div class="form-group">
                    <label  for="status" class="form-label">Status</label>
                    <select style="border:1px solid black" class="form-control" name="status" id="">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form><br>
        </div>



        <div class="col-md-4">
        </div>
    </div>
</div>
@endsection