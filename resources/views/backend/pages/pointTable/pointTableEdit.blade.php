@extends('backend.master')
@section('content')



<div>
    <form action="{{route('pointTable.update',$editPointTable->id)}}" method="post">
        @method('put')
        @csrf


        <h1>Point Table Edit Form</h1>

        <div class="container">

            <div class="mb-3">
                <label for="match" class="form-label">Match</label>
                <input value="{{$editPointTable->match}}" type="number" name="match" class="form-control" id="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="win" class="form-label">win</label>
                <input value="{{$editPointTable->win}}" type="number" name="win" class="form-control" id="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="lose" class="form-label">Lose</label>
                <input readonly value="{{$editPointTable->lose}}" type="number" name="lose" class="form-control" id="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="points" class="form-label">Points</label>
                <input readonly value="{{$editPointTable->points}}" type="number" name="points" class="form-control" id="" placeholder="">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status" id="">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>


@endsection