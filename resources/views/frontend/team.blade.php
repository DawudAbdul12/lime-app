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
                <h5 class="mt-3"> <strong>{{ $member->full_name }}</strong> </h5>
                <p class="gc">{{ $member->position }}</p>

                <div class="row">
                  <div class="col-12" style="text-align:center; padding-top:6%;">
                  <a href="/team" class="badge badge-pill badge-omni py-2 px-3 btn-info" data-toggle="modal" data-target="#myModal{{ $member->id }}" style="text-align:center; padding-top:6%;">See More</a>
                  </div>
                </div>
              </div>

              <!-- Modal -->
            <div id="myModal{{ $member->id }}" class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" >
            
              <div class="modal-dialog modal-lg modal-dialog-centered">

              <div class="modal-content">
                <div class="row mx-5 my-5">
                  <div class="col-12 col-md-4 ">
                    <img src="{{ asset('team_profile/'.$member->profile_pic)}}" alt="{{ $member->full_name }}" class="img-fluid team-img">
                    <h4 class="blc mt-3 text-center"><strong>{{ $member->full_name }}</strong> </h4>
                    <p class="gc">{{ $member->position }}</p>
                    
                  </div>

                  <div class="col-md-8">
                   {!! $member->bio !!}
                    
                   <div class="text-center">
                    <a  class="badge badge-pill badge-omni py-2 px-3 btn wc cb" data-dismiss="modal">Close</a>
                   </div>
                     
                  </div>
                </div>
              </div>
            </div>
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