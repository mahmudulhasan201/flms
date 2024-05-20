<div>
  @extends('backend.master')
  @section('content')

  <h1>Team Form</h1>
  <div>
    <form action="{{route('team.form')}}" method="post" enctype="multipart/form-data"> <!-- enctype image er jonno use -->
      @csrf

      <div class="mb-3">
        <label for="teamname" class="form-label">Team Name</label>
        <input type="text" name="Name" class="form-control" id="" aria-describedby="" placeholder="enter team name">
      </div>


      <div class="mb-3">
        <label for="logo" class="form-label">Team Logo</label>
        <input type="file" name="teamlogo" class="form-control" id="logo" placeholder="upload a logo">
      </div>

      <div class="mb-3">
        <label for="coachname" class="form-label">Coach Name</label>
        <input type="text" name="cname" class="form-control" id="" aria-describedby="" placeholder="enter Coach name">
      </div>

      <div class="mb-3">
        <label for="ownername" class="form-label">Owner Name</label>
        <input type="text" name="Oname" class="form-control" id="" aria-describedby="" placeholder="enter Owner name">
      </div>

      <div class="mb-3">
        <label for="owneremail" class="form-label">Owner Email</label>
        <input type="email" name="Oemail" class="form-control" id="" aria-describedby="" placeholder="enter Owner email">
      </div>

      <div class="mb-3">
        <label for="ownerpassword" class="form-label">Owner Password</label>
        <input type="password" name="ownerpassword" class="form-control" id="" aria-describedby="" placeholder="enter Owner password">
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
</div>