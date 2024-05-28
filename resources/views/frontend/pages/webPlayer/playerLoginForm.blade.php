@extends('frontend.master')
@section('content')

<div class="content-inner">
    <h1 class="text-center"><strong>Player Login Form</strong></h1>

    <div class="row" style="margin-top: 20px; margin-bottom:20px;">

        <div class="col-md-4">
        </div>

        <div class="col-md-4" style="border:2px solid black; padding:10px; border-radius:15px; background-color:white">

            <form action="{{route('player.login')}}" method="post">
                @csrf
                <div class="form-group">
                    <label style="color:black; font-size: 20px;" for="">Email address</label>
                    <input style="border: 1px solid black;" name="email_address" type="email" class="form-control" id="" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label style="color: black; font-size: 20px; " for="">Password</label>
                    <input style="border: 1px solid black;" name="password" type="password" class="form-control" id="" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="col-md-4">
        </div>

    </div>
</div>

@endsection