<?php
	$title = 'Lime & Honey - Juice';
	$descr = '';
	$page = 'juice';
	
?>

@include('lime.includes.header')

<div>
	<div class="container border-top">
		<div class="main-nav py-4">
			<ul>

				<li>
					<a href="/juice"   @if($active == "all") class="active" @endif >All Projects</a>
				</li>

				@foreach ($parentCategories as $parentCategory)
				    <li>
					   <a href="/juice/{{ $parentCategory->slug }}"  @if($active == $parentCategory->slug ) class="active"  @endif>{{  ucwords($parentCategory->title)  }}</a>
					</li>
				@endforeach

			</ul>
		</div>
	</div>
	<div class="mini-nav bg-grey p-3">
		<ul>

			@foreach ($childrenCategories as $childCategory) 
				
				{{-- get parent  category --}}
				@php
					foreach ($parentCategories as $key => $parent) {
						// parent category
						if($parent->id ==  $childCategory->parent){
							$parentCat = $parent->slug; 
						}
					}

				@endphp
				

				<li>
					<a href="/juice/{{ $parentCat }}/{{ $childCategory->slug }}" @if($active == $childCategory->slug ) class="active"  @elseif($subcategory == $childCategory->slug)  class="active" @endif>{{ ucwords($childCategory->title)  }}</a>
				</li>
			@endforeach

		</ul>
	</div>
	<div class="juice-grid">
	
		@foreach ($projects as $project)

		    <div class="project-card d-block p-relative">
				<img src="{{ asset('product_images/'.$project->pic )}}" alt="{{ $project->name }}" class="as-background">
				<div href="/project/{{ $project->slug }}" class="project-content">
					<p class="lead">{{ $project->name }}</p>
					<a href="/project/{{ $project->slug }}">{{ $project->name }}</a>
				</div>
			</div>
	
		@endforeach
	
	


		{{-- <div class="project-card d-block p-relative">
			<img src="images/project-1.jpg" alt="" class="as-background">
			<div href="single-juice.php" class="project-content">
				<a href="single-juice.php" class="lead mb-0">sweedy.com</a>
				<p class="small">trysweedy.com</p>
			</div>
		</div>
		<div class="project-card d-block p-relative">
			<img src="images/project-5.png" alt="" class="as-background">
			<div href="single-juice.php" class="project-content">
				<a href="single-juice.php" class="lead mb-0">sweedy.com</a>
				<p class="small">trysweedy.com</p>
			</div>
		</div>
		<div class="project-card d-block p-relative">
			<img src="images/project-3.png" alt="" class="as-background">
			<div href="single-juice.php" class="project-content">
				<a href="single-juice.php" class="lead mb-0">sweedy.com</a>
				<p class="small">trysweedy.com</p>
			</div>
		</div>
		<div class="project-card d-block p-relative">
			<img src="images/project-4.png" alt="" class="as-background">
			<div href="single-juice.php" class="project-content">
				<a href="single-juice.php" class="lead mb-0">sweedy.com</a>
				<p class="small">trysweedy.com</p>
			</div>
		</div>
		<div class="project-card d-block p-relative">
			<img src="images/project-2.png" alt="" class="as-background">
			<div href="single-juice.php" class="project-content">
				<a href="single-juice.php" class="lead mb-0">sweedy.com</a>
				<p class="small">trysweedy.com</p>
			</div>
		</div> --}}


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