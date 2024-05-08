@extends('frontend.master')
@section('content')


<div class="row" style="margin-top: 20px; margin-bottom:20px;">

<div class="col-md-3">
</div>

<div class="col-md-6" style="border:2px solid black; padding:10px; border-radius:15px;">

<form action="{{route('do.registration')}}" method="post">
@csrf

<div class="form-group">
    <label for=""> Customer Name</label>
    <input type="text" name="customer_name" class="form-control" id=""  placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="">Email address</label>
    <input name="customer_email" type="email" class="form-control" id="" placeholder="Enter email">
  </div>
  
  <div class="form-group">
    <label for="">Password</label>
    <input name="customer_password" type="password" class="form-control" id="" placeholder="Enter Password">
  </div>

  <div class="form-group">
    <label for="">Phone Number</label>
    <input name="customer_number" type="text" class="form-control" id="" placeholder="Enter Number">
  </div>

  <div class="form-group">
    <label for="">Status</label>
    <input name="customer_status" type="text" class="form-control" id="" placeholder="">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<div class="col-md-3">
</div>

</div>


@endsection