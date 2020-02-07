<!DOCTYPE html>
<html lang="en">
<head>
<title>OmniFert | Album Name</title>
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
              <strong>{{ $gallery->title }}</strong> </h1>
        </div>
      </div>
      
    </div>
  </section>

  <section class="globalspace">
  <div class="container">
      <div class="row">
          @foreach ($images as $image)
            
            <div class="col-md-3 col-12">
                <div class="entervas-konko mb-3">
                    <a href="{{asset('gallery_images/'.$image->img) }}" data-lightbox="albumName">
                        <img src="{{asset('gallery_images/'.$image->img) }}" alt="{{ $gallery->title }}" class="img-fluid vasimg">
                    </a>
                </div>
            </div>

          @endforeach


       
      </div>
  </div>
  </section>
    

<!-- footer includes -->
@include("frontend.includes.footer")
<!-- footer includes -->
</body>
</html>