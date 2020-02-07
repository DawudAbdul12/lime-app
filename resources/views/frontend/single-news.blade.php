<!doctype html>
<html lang="en">
<head>
  <title>OmniFert | Single News Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  @php $page = "news" @endphp


  <!-- include navigation -->
  @include("frontend.includes.navigation")
  <!-- include navigation -->


  <!-- top slider section -->
  <section class="news centeritem" style="background: linear-gradient( rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.32) 100%), url({{ asset('blog_images/'.$blog->pic)}});">
    <div class="container ">
      <div class="row ">
        <div class="col-12 col-md-8 ">
            <img src="img/facedown.svg" alt="" class="facedownlefttt d-none d-sm-block">
          <h1 class="display-4 wc">
          <strong>{{ $blog->title }}</strong> </h1>
          </div>
        </div>

      </div>
    </section>


    <section class="mt-5">
      <div  class="container">
        <div class="row mb-4">
          <div class="col-md-6 col-12">
            <h2><strong>{{ $blog->title }}</strong> </h2>
          </div>
        </div>


        <div class="row">
         {!! $blog->content !!}
        </div>
      </div>
    </section>


    <!-- news and media -->
    <section class="globalspace ">
      <div class="container">
    @if(count($news) > 0)
        
      <div  class="row">

          <div class="col-12 mb-3">
            <h3><strong>  You May Also Be Interested In</strong></h3>
          </div>

           @foreach ($news as $row)
              <div class="col-12 col-md-4  mb-5">

                  <div class="entervas-konko mb-3">
                      <a href="/news/{{ $row->slug }}">
                        <img src="{{ asset('blog_images/'.$row->pic) }}" alt="{{ $row->title}}" class="img-fluid vasimg">
                        <div class="overlay-light-black"></div>
                        <div class="text-contain px-4">
                          <p class="flagt3 mb-0">{{ $row->title }}</p>
                        </div>
                    </a>
                  </div>
                   <p class="product-mini">{!! limit_text($row->content, 250) !!}
                  </p>
                  <a href="/news/{{ $row->slug }}" class="btn btn-success btn-success2 pl-3 ">View All <i class='ml-5 rrr fa fa-angle-right '></i></a>
              </div>
           @endforeach
          
       </div>
    @endif

 </div>
</section>
<!-- news and media -->




<!-- footer includes -->
@include("frontend.includes.footer")
<!-- footer includes -->

</body>
</html>