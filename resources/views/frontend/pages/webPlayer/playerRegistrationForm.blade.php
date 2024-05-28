@extends('frontend.master')
@section('content')

<div class="content-inner" style="padding-left: 500px; padding-bottom: 200px">
    <div class="row">

        <div class="col-md-2">
        </div>

        <div class="col-md-8" style="background-color:white; border:2px solid black; padding:10px; border-radius:15px;">
            <form action="{{route('doPlayer.Registration')}}" method="post" enctype="multipart/form-data">
                @csrf
                <h2 style="color: black;"><strong>Player Registration Form</strong></h2><br>
                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="Player Name" class="form-label">Player Name</h5>
                    <input style="border:1px solid black;" type="text" name="player_name" class="form-control" id="" placeholder="Enter FullName">
                </div>

                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="Player Email" class="form-label">Player Email</h5>
                    <input style="border:1px solid black;" type="email" name="player_email" class="form-control" id="" placeholder="Enter Email Address">
                </div>

                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="password" class="form-label">Password</h5>
                    <input style="border:1px solid black;" type="password" name="player_password" class="form-control" id="" placeholder="Enter Password">
                </div>

                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="Born" class="form-label">Born</h5>
                    <input style="border:1px solid black;" type="date" name="born" class="form-control" id="" placeholder="Enter Birth Date">
                </div>

                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="Birth Place" class="form-label">Birth Place</h5>
                    <input style="border:1px solid black;" type="text" name="birth_place" class="form-control" id="" placeholder="Enter Your Birthplace">
                </div>

                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="height" class="form-label">Height (m)</h5>
                    <input style="border:1px solid black;" type="number" name="height" class="form-control" id="height" 
                    placeholder="Enter your height in meters" min="0.5" max="3" step="0.01" required>
                </div>

                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="Playing Role" class="form-label">Playing Role</h5>
                    <input style="border:1px solid black;" type="text" name="playing_role" class="form-control" id="" placeholder="Enter PLaying Role">
                </div>

                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="Batting style" class="form-label">Batting style</h5>
                    <input style="border:1px solid black;" type="text" name="batting_style" class="form-control" id="" placeholder="Enter Batting Style">
                </div>

                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="Bowling Style" class="form-label">Bowling Style</h5>
                    <input style="border:1px solid black;" type="text" name="bowling_style" class="form-control" id="" placeholder="Enter Bowling Style">
                </div>

                
                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="price" class="form-label">Asking Price</h5>
                    <input style="border:1px solid black;" type="number" name="price" class="form-control" id="" placeholder="Enter Your Asking Price">
                </div>


                <div class="mb-3">
                    <h5  style="color: black; font-size:20px ;" for="Photo" class="form-label">Player Image</h5>
                    <input style="border:1px solid black;" type="file" name="photo" class="form-control" id="" placeholder="">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</div>

@endsection