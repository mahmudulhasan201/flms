@extends('frontend.master')

@section('content')

<div class="content-inner">
    <h1 class="text-center">League</h1>
    <div class="container">
        @foreach($data as $league)

        <div class="card mb-3">
            <div class="row">
                <div class="col-md-4">
                    <img class="card-img-top" src="{{url('images/league',$league->leagueLogo)}}" alt="Card image cap">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">{{$league->leagueName}}</h5>
                        <p class="card-text"></p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="{{route('league.join')}}" class="btn btn-primary">Join</a>
                </div>
            </div><br>

            @endforeach

            <br><br>


        </div>
    </div>
    @endsection