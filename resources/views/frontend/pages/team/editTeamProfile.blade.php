
    @extends('frontend.master')
    @section('content')


    <div class="content-inner">
        <div class="row" style="margin-top: 20px; margin-bottom:20px;">

            <div class="col-md-4">
            </div>

            <div>
                <h1>Edit Team profile</h1>
                <form action="{{route('updateTeam.profile',$team->id)}}" method="post" enctype="multipart/form-data"> <!-- enctype image er jonno use -->
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="teamname" class="form-label">Team Name</label>
                        <input value="{{$team->teamName}}" type="text" name="Name" class="form-control" id="" aria-describedby="" placeholder="enter team name">
                    </div>


                    <div class="mb-3">
                        <label for="logo" class="form-label">Team Logo</label>
                        <input value="{{$team->teamLogo}}" type="file" name="teamlogo" class="form-control" id="logo" placeholder="upload a logo">
                    </div>

                    <div class="mb-3">
                        <label for="coachname" class="form-label">Coach Name</label>
                        <input value="{{$team->coachName}}" type="text" name="cname" class="form-control" id="" aria-describedby="" placeholder="enter Coach name">
                    </div>

                    <div class="mb-3">
                        <label for="ownername" class="form-label">Owner Name</label>
                        <input value="{{$team->ownerName}}" type="text" name="Oname" class="form-control" id="" aria-describedby="" placeholder="enter Owner name">
                    </div>

                    <div class="mb-3">
                        <label for="owneremail" class="form-label">Owner Email</label>
                        <input value="{{$team->ownerEmail}}" type="email" name="Oemail" class="form-control" id="" aria-describedby="" placeholder="enter Owner email">
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
