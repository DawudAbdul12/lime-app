<?php
	$title = 'Lime & Honey - Juice';
	$descr = '';
	$page = 'juice';

?>

@include('lime.includes.header')

<div>
	<div class="container border-top">
		<div class="main-nav py-5 text-center">
		    <h2>{{ ucwords($project->name) }}</h2>
			<p><span class="yellow-text">project:</span> <a href="{{ strtolower($project->name) }}" >{{ strtolower($project->name) }}</a></p>
		</div>
	</div>
	@foreach ($images as $image)
	   <img src=" {{ asset('product_images/'.$image->img)}}" alt="{{ ucwords($project->name) }}" class="w-100">
	@endforeach
	<!-- <div class="details py-80" style="background: #2A0823">
		<div class="container">
			<div class="summary mb-4">
				<h2><strong>Moodboard</strong></h2>
				<p class="mb-0">client: sweedy.com</p>
				<p class="mb-0">project: trysweedy.com</p>
				<p class="mb-0">duration: 60 seconds</p>
			</div>
			<div class="content mb-2">
				<img src="images/project-2.png" alt="" class="w-100">
				<p style="color: #BF0652;">001</p>
			</div>
			<div class="content mb-2">
				<img src="images/project-2.png" alt="" class="w-100">
				<p style="color: #BF0652;">002</p>
			</div>
			<div class="content mb-2">
				<img src="images/project-3.png" alt="" class="w-100">
				<p style="color: #15DF4E;">003</p>
			</div>
			<div class="content mb-2">
				<img src="images/project-3.png" alt="" class="w-100">
				<p style="color: #15DF4E;">004</p>
			</div>
			<div class="content mb-2">
				<img src="images/project-5.png" alt="" class="w-100">
				<p style="color: #F8E446;">005</p>
			</div>
			<div class="content mb-2">
				<img src="images/project-5.png" alt="" class="w-100">
				<p style="color: #F8E446;">006</p>
			</div>

			<div class="pt-80 text-right">
				<img src="images/.png" alt="" class="img-fluid">
			</div>
		</div>
	</div> -->
</div>

<div class="bg-grey py-80">
	<div class="container text-center">
		<h3 class="mb-4"><b>Got a Story ?</b></h3>
		<a href="" class="btn-yellow">Start a Project</a>
	</div>
</div>

@include('lime.includes.footer')
@include('lime.includes.footer-includes')