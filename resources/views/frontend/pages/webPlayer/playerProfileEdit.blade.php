@extends('frontend.master')

@section('content')


<div class="content-inner">
    <div class="row" style="margin-top: 20px; margin-bottom:20px;">

        <div class="col-md-4">
        </div>

        <div>
            <form action="{{route('updatePlayer.profile',$player->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                
                <h1> Edit Player Profile</h1>
                <div class="mb-3">
                    <label for="Player Name" class="form-label">Player Name</label>
                    <input value="{{$player->fullName}}" type="text" name="player_name" class="form-control" id="" placeholder="Enter Player Name">
                </div>

                <div class="mb-3">
                    <label for="Player Email" class="form-label">Player Email</label>
                    <input value="{{$player->email}}" type="email" name="player_email" class="form-control" id="" placeholder="Enter Email Address">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input value="{{$player->password}}" type="password" name="player_password" class="form-control" id="" placeholder="Enter Password">
                </div>

                <div class="mb-3">
                    <label for="Born" class="form-label">Born</label>
                    <input value="{{$player->born}}" type="date" name="born" class="form-control" id="" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="Birth Place" class="form-label">Birth Place</label>
                    <input value="{{$player->birthPlace}}" type="text" name="birth_place" class="form-control" id="" placeholder="Enter Birth Place">
                </div>

                <div class="mb-3">
                    <label for="height" class="form-label">Height (m)</label>
                    <input value="{{$player->height}}" type="number" name="height" class="form-control" id="height" placeholder="Enter your height in meters" min="0.5" max="3" step="0.01" required>
                </div>


                <div class="mb-3">
                    <label for="Playing Role" class="form-label">Playing Role</label>
                    <input value="{{$player->playingRole}}" type="text" name="playing_role" class="form-control" id="" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="Batting style" class="form-label">Batting style</label>
                    <input value="{{$player->battingStyle}}" type="text" name="batting_style" class="form-control" id="" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="Bowling Style" class="form-label">Bowling Style</label>
                    <input value="{{$player->bowlingStyle}}" type="text" name="bowling_style" class="form-control" id="" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="Photo" class="form-label">Player Image</label>
                    <input value="" type="file" name="photo" class="form-control" id="" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status" id="">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>
        </div>



        <div class="col-md-4">
        </div>
    </div>
</div>
@endsection