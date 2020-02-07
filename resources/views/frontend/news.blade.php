<!doctype html>
<html lang="en">
<head>
  <title>OmniFert | News</title>
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
  <section class="news centeritem">
    <div class="container ">
      <div class="row ">
        <div class="col-12 col-md-8 ">
            <img src="img/facedown.svg" alt="" class="facedownlefttt d-none d-sm-block">
          <h1 class="display-4 wc">
            News & <br>   <strong>Media</strong> </h1>
          </div>
        </div>

      </div>
    </section>

    <!-- news and media -->
    <section class="globalspace ">
      <div class="container">


        <div  class="row">


       @foreach ($news as $row)
          
            <div class="col-12 col-md-4  mb-5">

              <div class="entervas-konko mb-3">
                <a href="/news/{{ $row->slug }}">
                  <img src="{{ asset('blog_images/'.$row->pic) }}" alt="{{ $row->title}}" class="img-fluid vasimg">
                  <div class="overlay-light-black"></div>
                  <div class="text-contain px-4">
                  <p class="flagt3 mb-0">{{ $row->title}}</p>
                </div>
              </a>
            </div>
            <p class="product-mini">{!! limit_text($row->content, 250) !!}
            </p>
            <a href="/news/{{ $row->slug }}" class="btn btn-success btn-success2 pl-3 ">View All <i class='ml-5 rrr fa fa-angle-right '></i></a>
          </div>

        @endforeach

     <div class="col-12 text-center">
        {{ $news->links()}}
     </div>




   </div>
 </div>
</section>
<!-- news and media -->



<!-- map and contat info -->

<section class="rela">
    <div class="container-fluid ">
      <div class="row ">
        <div class="col-12 px-0">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7942.007138836747!2d-0.17081!3d5.566486!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9a9ed1e9dad3%3A0x66f4e695d46148a!2s28%20Church%20Cres%20St%2C%20Accra!5e0!3m2!1sen!2sgh!4v1568330672892!5m2!1sen!2sgh" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
  
  
        <div class="col-12 col-md-5 moveonmap  ">
          <div class="card2">
            <div class="card-body pl-5">
              <h4 class="mb-3">GET IN  <span class="lgc">TOUCH</span></h4>
              <p>No.28, Church Crescent St, North Labone <br>
                P.O.BOX AN 6153 <br>
                Accra, Ghana.</p>
  
              <a href="tel:002330302767400" class="mapLink"><h5>+233 (0)302 767400</h5></a>
              <a href="mailto:sales@omnifert.com" class="mapLink"><h5>sales@omnifert.com</h5></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- map and contat info -->

<!-- footer includes -->
@include("frontend.includes.footer")
<!-- footer includes -->

</body>
</html>