@extends('frontend.master')

@section('content')
<div class="hero overlay" style="background-image: url('images/others/background image.webp');">
	<div class="content-inner" style="margin-bottom: 365px; padding:183px">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Section Title -->

				</div>
			</div>
			<div class="container-fixture" style="background-image: url(images/league/{{$matches->league->leagueLogo}});">
				<div style="background-color:black;">
					<h2 class=" text-center" style="color:aliceblue;"><b>{{$matches->league->leagueName}}</b></h2>
				</div>
				<div class="row d-flex justify-content-center">

					<div class="col-lg-3 col-md-4 col-sm-6" style="background-image: url('images/team/{{$matches->homeTeam->teamLogo}}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 200px; /* Adjust width as needed */
            height: 150px; /* Adjust height as needed */
            border: 2px solid black;
            padding: 10px;
            border-radius: 15px;">
						<div class="speaker-item">
							<div class="image">
								<!-- <img style="width: 300px;height:200px;" src="" alt="" class="img-fluid"> -->
								<div class=""></div>
							</div>
							<div class="content text-center">
								<h5><a style="color:black;" href="">{{$matches->homeTeam->teamName}}</a></h5>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<h3 class="text-center"><b>VS</b></h3>

					</div>
					<div class="col-lg-3 col-md-4 col-sm-6" style="background-image: url('images/team/{{$matches->awayTeam->teamLogo}}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 200px; /* Adjust width as needed */
            height: 150px; /* Adjust height as needed */
            border: 2px solid black;
            padding: 10px;
            border-radius: 15px;">
						<div class="speaker-item">
							<div class="image">
								<!-- <img style="width: 300px;height:200px;" src="" alt="" class="img-fluid"> -->
								<div class=""></div>
							</div>
							<div class="content text-center">
								<h5><a style="color:black;" href="">{{$matches->awayTeam->teamName}}</a></h5>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>



	@endsection