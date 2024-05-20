@extends('backend.master')
@section('content')



<div>
    <form action="{{route('pointTable.form')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Point Table Form</h1>

        <div class="container">
            <div class="form-group">
                <label for="">League</label>
                <select class="form-control" name="league_id">
                    <option value="">Select League</option>
                    @foreach($leaguePointTable as $data)
                    <option value="{{$data->id}}">{{$data->leagueName}}</option>
                    @endforeach
                </select>
            </div><br>


            <div class="mb-3">
                <label for="" class="">Team Id</label>
                <select name="team_id" class="form-control" id="">
                    <option value="">select Team</option>
                    @foreach($teamPointTable as $data)
                    <option value="{{$data->id}}">{{$data->teamName}}</option>
                    @endforeach
                </select>
            </div><br>

            <div class="mb-3">
                <label for="match" class="form-label">Match</label>
                <input type="number" name="match" class="form-control" id="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="win" class="form-label">win</label>
                <input type="number" name="win" class="form-control" id="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="lose" class="form-label">Lose</label>
                <input type="number" name="lose" class="form-control" id="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="points" class="form-label">Points</label>
                <input type="number" name="points" class="form-control" id="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status" id="">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection