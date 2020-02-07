<?php
	$title = 'Lime & Honey - About Us';
	$descr = '';
	$page = 'phsychos';
?>


@include('lime.includes.header')

<header class="main-banner">
	<img src="images/banner-1.jpg" alt="" class="as-background">
</header>

<div class="container py-80">
	<div class="row">
		<div class="col-xl-7 col-lg-9 col-md-10 col-12 mx-auto text-center">
			<h1 class="mb-2"><strong>Who We Are.</strong></h1>
			<h6 class="grey-text mb-5"><strong>Creative Digital Agency</strong></h6>
			<p class="lead grey-text mb-0">We're a small team with a loud mouth and the zeal for story telling in the most unique ways possible. We give brands and businesses the much-needed oomph, to stay on the minds and in the hearts of their customers.</p>
		</div>
	</div>
</div>

<div class="culture">
	<div class="culture-left py-80">
		<h1><strong>Our <br>Culture.</strong></h1>
	</div>
	<div class="culture-right">
		<h2 class="mb-0"><strong>We love crazy!</strong></h2>
		<p class="py-4 mb-0">Creative storytelling runs in our blood.</p>
		<p>We promise to help you jump off a cliff if you want to. We can't jump with you because we need to work on your business. But we promise to give you a push. :)</p>
	</div>
</div>

<div class="team bg-grey py-80">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="mb-5"><strong>Our Team.</strong></h2>
			</div>

             @foreach ($teams as $team)
			     <div class="col-md-4 col-12 mb-4">
					<img src="{{ asset('team_profile/'.$team->profile_pic) }}" alt="{{ ucwords($team->full_name) }}" class="img-fluid w-100 mb-4">
				    <p class="mb-1">{{ ucwords($team->full_name) }}</p>
					<p class="small grey-text">{{ ucwords($team->position) }}</p>
				 </div>
			 @endforeach
				

			{{-- <div class="col-md-4 col-12 mb-4">
				<img src="images/team.png" alt="" class="img-fluid w-100 mb-4">
				<p class="mb-1">Emmanuel Dankyi</p>
				<p class="small grey-text">CEO/CREATIVE LEAD</p>
			</div>
			<div class="col-md-4 col-12 mb-4">
				<img src="images/team.png" alt="" class="img-fluid w-100 mb-4">
				<p class="mb-1">Claude Attippoe</p>
				<p class="small grey-text">PRODUCTION MANAGER</p>
			</div>
			<div class="col-md-4 col-12 mb-4">
				<img src="images/team.png" alt="" class="img-fluid w-100 mb-4">
				<p class="mb-1">Ben Arthur</p>
				<p class="small grey-text">CEO/LEAD STRATEGIST</p>
			</div>
			<div class="col-md-4 col-12 mb-4">
				<img src="images/team.png" alt="" class="img-fluid w-100 mb-4">
				<p class="mb-1">Emmanuel Dankyi</p>
				<p class="small grey-text">CEO/CREATIVE LEAD</p>
			</div>
			<div class="col-md-4 col-12 mb-4">
				<img src="images/team.png" alt="" class="img-fluid w-100 mb-4">
				<p class="mb-1">Claude Attippoe</p>
				<p class="small grey-text">PRODUCTION MANAGER</p>
			</div> --}}


		</div>
	</div>
</div>

@include('lime.includes.footer')
@include('lime.includes.footer-includes')