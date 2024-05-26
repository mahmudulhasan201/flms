@extends('frontend.master')

@section('content')
<div class="hero overlay" style="background-image: url('images/others/background image.webp');">
	<div class="content-inner" style="margin-bottom: 365px; padding:208px">
		@if($matches)
		<div class="container">
			<div class="row d-flex justify-content-between">
				<h2>Date: {{$matches->date}}</h2>
				<h2 class="text-right">Upcoming Featured Match</h2>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Section Title -->

				</div>
			</div>
			<div class="container-fixture" style="background-image: url(images/league/{{$matches->league->leagueLogo}});">
				<div style="background-color:black;">
					<h1 class=" text-center" style="color:aliceblue;"><b>{{$matches->league->leagueName}}</b></h1>
				</div>
				<div class="row d-flex justify-content-center">

					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="speaker-item">
							<div class="image">
								<img style="width: 300px;height:150px;" src="{{url('images/team/'.$matches->homeTeam->teamLogo)}}" alt="" class="img-fluid">
								<div class=""></div>
							</div>
							<div class="content text-center" style="background:white;">
								<h5><a style=" color:black; font-weight: bold;" href="">{{$matches->homeTeam->teamName}}</a></h5>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<h1 class="text-center" style="margin-left:120px; border: 2px solid red; display: inline-block; padding: 5px;"><b>VS</b></h1>

					</div>
					<div class=" col-lg-3 col-md-4 col-sm-6">
						<div class="speaker-item">
							<div class="image">
								<img style="width: 300px;height:150px;" src="{{url('images/team/'.$matches->awayTeam->teamLogo)}}" alt="" class="img-fluid">
								<div class=""></div>
							</div>
							<div class="content text-center" style="background:white;">
								<h5><a style="color:black; font-weight: bold;" href="">{{$matches->awayTeam->teamName}}</a></h5>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		@endif
	</div>



	@endsection