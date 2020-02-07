<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title ?></title>
		<link rel="shortcut icon" type="image/png" href=" {{ asset('images/logo-black.png') }}">

		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="description" content="<?php echo $descr ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Stylesheet -->
		<link rel="stylesheet" type="text/css" href=" {{ asset('css/bootstrap.min.css')}}">

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600&display=swap" rel="stylesheet">

		<!-- Owl Carousel CSS-->
		<link rel="stylesheet" href=" {{ asset('css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href=" {{ asset('css/owl.theme.default.min.css') }}">

		<!-- Animate CSS-->
		<link rel="stylesheet" href=" {{ asset('css/animate.css') }}">

		<!-- Themify Icons -->
		<link rel="stylesheet" href=" {{ asset('css/themify-icons.css') }}">

		<!-- Custom Stylesheet -->
		<link rel="stylesheet" type="text/css" href=" {{ asset('css/main.css')}}">

	</head>
	<body>
		<nav class="navbar navbar-expand-sm navbar-light fixed-top">
			<div class="container">
				<a class="navbar-brand" href="/index">
					<img src=" {{ asset('images/logo-black.png')}}" alt="" class="img-responsive">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false">
					<span class="ti-menu"></span>
				</button>
				<div class="collapse navbar-collapse" id="main-navbar">
					<ul class="navbar-nav ml-md-auto">
						<li class="nav-item <?= $page == 'home' ? 'active':''; ?>">
							<a class="nav-link px-3" href="/index">HOME</a>
						</li>
						<li class="nav-item <?= $page == 'skillset' ? 'active':''; ?>">
							<a class="nav-link px-3" href="/skillset">SKILLSET</a>
						</li>
						<li class="nav-item <?= $page == 'juice' ? 'active':''; ?>">
							<a class="nav-link px-3" href="/juice">JUICE</a>
						</li>
						<li class="nav-item <?= $page == 'phsychos' ? 'active':''; ?>">
							<a class="nav-link px-3" href="/phsychos">PHSYCHOS</a>
						</li>
						<li class="nav-item <?= $page == 'contact' ? 'active':''; ?>">
							<a class="nav-link px-3" href="/contact">CONTACT</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div class="d-block d-md-none" style="height:82px;"></div>