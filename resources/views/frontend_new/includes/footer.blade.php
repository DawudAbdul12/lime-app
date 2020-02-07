<!doctype html>
<html lang="en">
<head>
  <title>OmniFert | Team</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  @php $page = "team" @endphp



  <!-- include navigation -->
  @include("frontend.includes.navigation")
  <!-- include navigation -->



  <!-- top slider section -->
  <section class="team centeritem">
    <div class="container ">
      <div class="row ">
        <div class="col-12 col-md-8 ">
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
                <img src="{{ asset('team_profile/'.$member->profile_pic)}}" alt="{{ $member->full_name }}" class="img-fluid">
                <h5 class="mt-3"> <strong>{{ $member->full_name }}</strong> </h5>
                <p class="gc">{{ $member->position }}</p>
                <a href="#"><span class="badge badge-pill badge-omni py-2 px-3">See More</span></a>
              </div>

          @endforeach
       
     
      </div>
    </div>
  </section>

  <!-- our tems -->









<!-- footer includes -->
@include("frontend.includes.footer")
<!-- footer includes -->

</body>
</html>