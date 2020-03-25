<?php
	$title = '';
	$descr = '';
	$page = '';
?>

@include('lime.includes.header')


<div class="bg-black py-80 border-top">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2><strong>Let's work together</strong></h2>
				<p class="mb-5">START A PROJECT, SCHEDULE A TALK, OR JUST SAY HELLO</p>
			</div>
			<div class="col-xl-8 col-lg-10 col-12 mx-auto">
				<form action="">
					<div class="form-group">
						<input type="text" class="form-input" placeholder="Start a Project">
					</div>
					<div class="row">
						<div class="col-md-6 col-12">
							<div class="form-group">
								<input type="text" class="form-input" placeholder="Full Name">
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="form-group">
								<input type="email" class="form-input" placeholder="Email Address">
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="form-group">
								<input type="text" class="form-input" placeholder="Phone Number">
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="form-group">
								<input type="text" class="form-input" placeholder="Location">
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="form-group">
								<input type="text" class="form-input" placeholder="Company or Organisation">
							</div>
						</div>
						<div class="col-md-6 col-12">
							<div class="form-group">
								<input type="text" class="form-input" placeholder="How did you hear about us">
							</div>
						</div>
					</div>
					<div class="form-group">
						<textarea rows="5" class="form-input" placeholder="Message*"></textarea>
					</div>
					<div class="text-right">
						<button class="btn-yellow">SUBMIT</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="container py-80">
	<div class="row">
		<div class="col-12 text-center">
			<h3 class="with-border-bottom mb-5"><strong>New Business</strong></h3>
			<p class="mb-0"><a mailto="info@limexhoney.com">info@limexhoney.com</a></p>
		</div>
	</div>
</div>

@include('lime.includes.footer')
@include('lime.includes.footer-includes')