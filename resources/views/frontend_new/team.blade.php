<!doctype html>
<html lang="en">
<head>
  <title>OmniFert | Team</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">



  <!-- include navigation -->
  @include("frontend.includes.navigation")
  <!-- include navigation -->



  <!-- top slider section -->
  <section class="team centeritem">
    <div class="container ">
      <div class="row ">
        <div class="col-12 col-md-8 ">
          <img src="img/facedown.svg" alt="" class="facedownlefttt d-none d-sm-block">
          <h1 class="display-4 wc">
            Meet <br> The  <strong>Team</strong> </h1>
        </div>
      </div>
      
    </div>
  </section>






  <!-- our tems -->

  <section class="globalspace ">
    <div class="container">
  

     
          <div class="row text-center">

           @foreach ($teams as $member)
                <div class="col-6 col-md-3 mt-5">
                  <img src="{{ asset('team_profile/'.$member->profile_pic)}}" alt="{{ $member->full_name }}" class="img-fluid team-img">
                  <h5 class="mt-3">{{ $member->full_name }} </h5>
                  <p class="gc">{{ $member->position }}</p>

                </div>
            @endforeach
      
{{-- 

            <div class="col-6 col-md-3 mt-5">
              <img src="img/team/Pamela Zormelo copy.jpg" alt="" class="img-fluid team-img">
              <h5 class="mt-3">Mrs. Pamela <strong>Zormelo</strong> </h5>
              <p class="gc">Group General Manager</p>
              
            </div>
            

            <div class="col-6 col-md-3 mt-5">
              <img src="img/team/Doreen Ankumah.jpg" alt="" class="img-fluid team-img">
              <h5 class="mt-3">Mrs. Doreen <strong>Ankumah</strong> </h5>
              <p class="gc">HR & Administrative Manager</p>
              
            </div>
            <div class="col-6 col-md-3 mt-5">
              <img src="img/team/PARIKH JIGNESH.jpg" alt="" class="img-fluid team-img">
              <h5 class="mt-3">Mr. Parikh  <strong>Jignesh </strong></h5>
              <p class="gc">Chief Finance Officer (CFO)</p>
              
            </div>
            </div>

            <div class="row text-center">
            <div class="col-6 col-md-4 mt-5">
              <img src="img/team/Kofi Annan Dennis.jpg" alt="" class="img-fluid team-img" style="width:260px;">
              <h5 class="mt-3">Mr. Kofi  <strong>Annan-Dennis </strong></h5>
              <p class="gc">Shipping & Logistics Manager</p>
              
            </div>

            <div class="col-6 col-md-4 mt-5">
              <img src="img/team/PAUL PYPERS YAW DONKOR.jpg" alt="" class="img-fluid team-img" style="width:260px;">
              <h5 class="mt-3">Mr. Paul Pypers Yaw <strong>Donkor</strong> </h5>
              <p class="gc">Health, Safety & Environment - Supervisor</p>

            </div>

            <div class="col-6 col-md-4 mt-5">
              <img src="img/team/Dominic Donkoh.jpg" alt="" class="img-fluid team-img" style="width:260px;">
              <h5 class="mt-3">Mr. Dominic <strong>Donkoh</strong> </h5>
              <p class="gc">Business Development Manager</p>

            </div>


            <div class="col-6 col-md-4 mt-5">
              <img src="img/team/Samuel Twumasi Ankrah.jpeg" alt="" class="img-fluid team-img" style="width:260px;">
              <h5 class="mt-3">Mr. Samuel Twumasi <strong>Ankrah</strong> </h5>
              <p class="gc">Production  Manager</p>

            </div>
            

            <div class="col-6 col-md-4 mt-5">
              <img src="img/team/Francis Tsietey Amable.jpg" alt="" class="img-fluid team-img" style="width:260px;">
              <h5 class="mt-3">Mr. Francis Tseitey <strong>Amable</strong> </h5>
              <p class="gc">Warehouse Supervisor</p>
            </div>


            <div class="col-6 col-md-4 mt-5">
              <img src="img/team/Isaac Selorm Ahorne.jpg" alt="" class="img-fluid team-img" style="width:260px;">
              <h5 class="mt-3">Mr. Isaac Selorm <strong>Ahorne </strong></h5>
              <p class="gc">Operations Supervisor</p>
            </div> --}}

            </div>

      </div>
    </div>
  </section>

  <!-- our tems -->



<!-- footer includes -->
@include("frontend.includes.footer")
<!-- footer includes -->

</body>
</html>