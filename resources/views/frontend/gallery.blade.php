<!DOCTYPE html>
<html lang="en">
<head>
<title>OmniFert | Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  @php $page = "gallery" @endphp
  <!-- include navigation -->
    @include("frontend.includes.navigation")
  <!-- include navigation -->
</head>
<body>
<!-- top slider section -->
  <section class="project centeritem">
    <div class="container ">
      <div class="row ">
        <div class="col-12 col-md-8 ">
            <img src="img/facedown.svg" alt="" class="facedownlefttt d-none d-sm-block">
          <h1 class="display-4 wc">
            Media <br>  <strong>Gallery</strong> </h1>
        </div>
      </div>
      
    </div>
  </section>

  <section class="globalspace">
      <div class="container">
          <div class="row">

            @foreach ($gallery as $row)
                
                <div class="col-md-4 col-12 mb-5">
                <a href="/album/{{ $row->slug }}">
                        <div class="gallery_item mb-3">
                        <img src="{{asset('gallery_images/'.$row->banner) }}" class="img-fluid vasimg" alt="{{ $row->title }}">
                              <div class="overlay-light-black"></div>
                              <div class="text-contain px-4" style="padding-top:8rem!important;">
                              <p class="pb-3 mb-0 flagt4"> <strong>{{ $row->title }}</strong></p>
                          </div>
                    </div></a>
                </div>

              @endforeach

             
          </div>  
          <div class="row">
              <div class="col-12 text-center">
                {{ $gallery->links() }}
                {{-- <a href="#" class="btn btn-success btn-success2" style="padding:0!important; border:none;">      
                <i class='rrr fa fa-angle-left' id="left_gall"></i><a href="#" class="btn btn-success btn-success2" style="padding:0!important; border:none;"><i class='lll fa fa-angle-right' id="right_gall" ></i>
                </a> --}}
          </div>   
      </div>
  </section>
    


<!-- footer includes -->
@include("frontend.includes.footer")
<!-- footer includes -->
</body>
</html>