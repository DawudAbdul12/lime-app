<?php
	$title = 'Lime & Honey - Welcome';
	$descr = '';
	$page = 'home';
?>

@include('lime.includes.header')

<header class="main-banner xy-center">
	<img src="{{ asset('images/banner.jpg')}}" alt="" class="as-background">
	<div class="container">
		<div class="col-lg-6 col-md-9 col-12 ml-auto">
			<h6>WELCOME TO LIME & HONEY</h6>
			<h1>Story is <span>King.</span></h1>
		</div>
	</div>
</header>

<div class="pt-80 bg-black section-1">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-9 col-md-10 col-12 mx-auto text-center">
				<h2 class="title-text mb-4">We're A Relentless & Impulsive Bunch.</h2>
				<p>Creating connections with every story we tell.</p>
				<a href="/honeys"><span>LEARN MORE</span></a>
			</div>
		</div>
	</div>
</div>

<div class="container py-80">
	<div class="row align-items-center">
		<div class="col-md-6 col-12">
			<img src="{{ asset('images/brand.jpeg')}}" alt="" class="img-fluid">
		</div>
		<div class="col-xl-5 col-md-6 col-12">
			<p class="lead mb-4">We break down your scary business ideas into working solutions leaving the best aftertaste in the mouth of your clients.</p>
			<a href="" class="link-with-rule">BROWSE OUR SERVICES</a>
		</div>
	</div>
</div>


<div class="container pb-5 section-2">
	<div class="row">
		<div class="col-12 text-center">
			<img src="{{ asset('images/2.png')}}" alt="" class="img-fluid">
		</div>
		<div class="col-xl-7 col-lg-9 col-md-10 col-12 mx-auto text-center">
			<h2 class="mb-4">We Create Stories By Telling Stories.</h2>
			<p class="lead">Crazy runs in our veins and creative juice out our pores. If no one asks who the 'flipping yeck' are they after our touch, we failed - we never.</p>
		</div>
	</div>
</div>

<div class="projects">
	<div class="project-grid">

        @foreach ($projects as $project)
			
			<div class="project-card d-block p-relative">
				<img src="{{ asset('product_images/'.$project->pic )}}" alt="{{ $project->name }}" class="as-background">
				<div class="project-content">
					<p class="lead">{{ $project->name }}</p>
				    <a href="project/{{ $project->slug }}" >{{ $project->name }}</a>
				</div>
			</div>

		@endforeach



     {{-- 
		<div class="project-card d-block p-relative">
			<img src="{{ asset('images/project-1.jpg')}}" alt="" class="as-background">
			<div class="project-content">
				<p class="lead">sweedy.com</p>
				<a href="trysweedy.com" target="new">trysweedy.com</a>
			</div>
		</div>
		<div class="project-card d-block p-relative">
			<img src="{{ asset('images/project-5.png')}}" alt="" class="as-background">
			<div class="project-content">
				<p class="lead">sweedy.com</p>
				<a href="trysweedy.com" target="new">trysweedy.com</a>
			</div>
		</div>
		<div class="project-card d-block p-relative">
			<img src="{{ asset('images/project-3.png')}}" alt="" class="as-background">
			<div class="project-content">
				<p class="lead">sweedy.com</p>
				<a href="trysweedy.com" target="new">trysweedy.com</a>
			</div>
		</div>
		<div class="project-card d-block p-relative">
			<img src="{{ asset('images/project-4.png')}}" alt="" class="as-background">
			<div class="project-content">
				<p class="lead">sweedy.com</p>
				<a href="trysweedy.com" target="new">trysweedy.com</a>
			</div>
		</div> --}}



	</div>
	<div class="py-5 text-center bottom-section">
		<a href="/juice">VIEW OUR PROJECTS</a>
	</div>
</div>

<div class="container py-80 clients">
	<div class="row">
		<div class="col-12 text-center">
			<h2 class="mb-5">Clients.</h2>
		</div>
		<div class="col-lg-9 col-12 mx-auto">
			<div class="logo-grid">
			   @foreach ($brands as $brand)
			   
				  <img src="{{ asset('brand_img/'.$brand->image )}}" alt="{{ $brand->title }}">
				
			   @endforeach
				
				{{-- <img src="images/logo-2.png" alt="">
				<img src="images/logo-1.png" alt="">
				<img src="images/logo-2.png" alt="">
				<img src="images/logo-1.png" alt="">
				<img src="images/logo-2.png" alt="">
				<img src="images/logo-1.png" alt="">
				<img src="images/logo-2.png" alt="">
				<img src="images/logo-1.png" alt=""> --}}
			</div>
		</div>
	</div>
</div>

<div class="bg-grey py-80">
	<div class="container text-center">
		<h3 class="mb-4"><b>Got a Story ?</b></h3>
		<a href="" class="btn-yellow">Start a Project</a>
	</div>
</div>

@include('lime.includes.footer')
@include('lime.includes.footer-includes')
