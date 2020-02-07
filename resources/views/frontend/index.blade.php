<!doctype html>
<html lang="en">
<head>
  <title>OmniFert</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  @php $page = "index" @endphp



  <!-- include navigation -->
  @include("frontend.includes.navigation")
  <!-- include navigation -->


  

  <!-- Top slider section -->
  <!--Carousel Wrapper-->
  <section class="homeSlider">
    <div id="imgCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
      @foreach($sliders as $key => $slider)
      <li data-target="#imgCarousel" data-slide-to="{{$key}}"  @if($key == 0) class="active" @endif ><img src="{{ asset('slider_images/'.$slider->pic) }}" alt="{{ $slider->title }}"></li>
   @endforeach

    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
    
        @foreach($sliders as $key => $slider)

        <div class="carousel-item  @if($key == 0) active  @endif">
          <div class="sliderOverlay">
          </div>
          <img class="d-block w-100" src="{{ asset('slider_images/'.$slider->pic) }}"
              alt="{{ $slider->title }}">
        </div>

      @endforeach


    </div>
    <!--/.Slides-->
    </div>
<!--/.Carousel Wrapper-->
    <div class="container centeritem h-100 ">
        <div class="row ">
          <div class="col-12 col-md-8 " id="homeTxt">
            <h1 class="homebittext">
              Providing affordable <br> fertilizers to farmers.
            </h1>
            <p class="wc">OmniFert is a wholly owned indigenous Ghanaian company focusing on improving the crop production of Africa by providing affordable fertilizers to farmers.</p>
          </div>
          <div class="col-md-4 icon-bar ">
            <a href="https://www.instagram.com/omnifert/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://www.facebook.com/omnifert" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="#" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
          </div>
        </div> 
    </div>
  </section>


  <!-- about on home -->
  <section class="greenbackabout">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-7">
          <h1 class="wc">About <strong>us</strong> </h1>
          <h4 class="wc">Get to know about <strong>Omnifert</strong> </h4>
          <p class="wc">OmniFert is a wholly owned indigenous Ghanaian company focusing on improving the crop production of Africa by providing affordable fertilizers to farmers, establishing commercial sized farms to produce crops such as cassava, millet, sorghum, maize, soya, etc. to bridge the gaps in the local supply as well as conduct soil tests on farms so as to accurately determine the fertilizer needs specific to each farm.
          </p>
          <img src="img/omniabt.png" alt="" class="img-fluid kkkkk ">
        </div>

        <div class="col-12 col-md-5">
          <img src="img/facedown.svg" alt="" class="hungtopright d-none d-sm-block">

          <h4 class="wc">Our <strong>Objectives </strong> </h4>
          <p class="wc">Develop a state-of-the art fertilizer blending facility in Ghana to serve the landlocked countries of Burkina Faso, Mali, and Niger.</p>

          <p class="wc">Provide high quality fertilizer at the right time and right price to smallholder and commercial farmers in Ghana, Burkina Faso, Mali, and Niger</p>

          <p class="wc">Improve agriculture productivity, incomes and employment opportunities in the aforementioned countries; and</p>

          <p class="wc">Establish efficient agriculture ­ industry linkages in the aforementioned countries</p>

          <p class="wc">Establish commercial farms to supply produce to meet gaps in Ghana’s local yield as well as for export.</p>
          <img src="img/faceup.svg" alt="" class="hungdownright d-none d-sm-block">
        </div>
      </div>
    </div>
  </section>
  <!-- about on home -->



  <!-- our tems -->

  <section class="globalspace ">
    <div class="container">
      <div class="row centeritem"> 

        <div class="col-12 col-md-3">
          <h1 class="gc">Meet <br> <strong>the Team</strong> </h1>
        </div>
        <div class="col-12 col-md-9">
          <div class="row text-center">
            @foreach ($teams as $member)

              <div class="col-12 col-md-4 mt-3">
                  <img src="{{ asset('team_profile/'.$member->profile_pic)}}" alt="{{ $member->full_name }}" class="img-fluid team-img">
              <h5 class="mt-3"> <strong>{{ $member->full_name }}</strong> </h5>
                  <p class="gc">{{ $member->position }}</p>
                  
              </div>

            @endforeach

         
            
          </div>
          <div class="row">
              <div class="col-12" style="text-align:center; padding-top:6%;">
                <a href="/team"><span class="badge badge-pill badge-omni py-2 px-3 ">See Team</span></a>
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- our tems -->



  <!-- our products  -->
  <section class="greenbackp">
    <div class="container">
      <div class="row ">
        <div class="col-12 col-md-4  mb-4">
         <h1 class="wc">Our <strong>Products</strong> </h1>
         <p class="wc">We aim to improve agriculture productivity in Africa with the provision of high quality fertilizer at the right price to smallholder and commercial farmers.</p>

         <a href="products.php" class="btn btn-success">View All <i class='pl-3 fa fa-angle-right '></i></a>
       </div>
       <div class="col-12 col-md-8">
         <div class="row ">

          @foreach ($products as $product)

            <div class="col-md-6 col-12 centeritem2 mb-5">
             <a href="/product/{{$product->slug}}">
                <div class="row">
                  <div class="col-5">
                    <img src="{{ asset('product_images/'.$product->pic)}}" class="img-fluid rounded-circle2" alt="">
                  </div>
                  <div class="col-7 prod3 centeritem">
                    <div class="wc">
                      <h5><strong>{{ $product->name}}</strong> </h5>
                      {{-- <p class="mb-0 product-mini ">
                        {!! limit_text($product->content, 100) !!}
                      </p> --}}
                      {{-- <p class="mb-0 product-mini "> EINECS No.: 200-315-5</p>
                      <p class="mb-0 product-mini "> Formula: CH4N2 Molecular</p>
                      <p class="mb-0 product-mini ">Weight: 60.06</p> --}}
                    </div>
                  </div>
                </div>
              </a>
            </div>
              
          @endforeach
           


        </div>
      </div>
    </div>
  </div>
</section>

<!-- our products  -->



<!-- news and media -->
<section class="globalspace ">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-4">
        <h1 class="gc">News & Media</h1>
      </div>
    </div>

    <div  class="row">
   @foreach ($news as $row)
   <div class="col-12 col-md-4  mb-4">
        <div class="entervas-konko mb-3">
            <a href="/news/{{ $row->slug }}">
              <img src="{{ asset('blog_images/'.$row->pic) }}" alt="{{ $row->title}}" class="img-fluid vasimg">
              <div class="overlay-light-black"></div>
              <div class="text-contain px-4">
              <p class="flagt3 mb-0">{{ $row->title}}</p>
            </div>
          </a>
      </div>
      <p class="product-mini">{!! limit_text($row->content, 250) !!}</p>

    <a href="/news/{{ $row->slug }}" class="btn btn-success btn-success2 pl-3 ">View All <i class='ml-5 rrr fa fa-angle-right '></i></a>
   </div>
   @endforeach
     



{{-- 
     <div class="col-12 col-md-4  mb-4">

      <div class="entervas-konko mb-3">
        <a href="single-news.php">
          <img src="img/b1.png" alt="" class="img-fluid vasimg">
          <div class="overlay-light-black"></div>
          <div class="text-contain px-5">
           <p class="flagt4 mb-0">Enhance the Natural fertility of the soil</p>
         </div>
       </a>
     </div>
     <p class="product-mini">MOP has a high nutrient concentration and is therefore relatively price competitive with other forms of potassium. The chloride content of MOP can also be beneficial where soil chloride is low. Recent research has shown that chloride improves yield by increasing disease resistance in crops. Inc.
     </p>

     <a href="single-news.php" class="btn btn-success btn-success2 pl-3 ">View All <i class='ml-5 rrr fa fa-angle-right '></i></a>
   </div>


   <div class="col-12 col-md-4  mb-4">

    <div class="entervas-konko mb-3">
      <a href="single-news.php">
        <img src="img/b1.png" alt="" class="img-fluid vasimg">
        <div class="overlay-light-black"></div>
        <div class="text-contain px-5">
         <p class="flagt4 mb-0">Enhance the Natural fertility of the soil</p>
       </div>
     </a>
   </div>
   <p class="product-mini">MOP has a high nutrient concentration and is therefore relatively price competitive with other forms of potassium. The chloride content of MOP can also be beneficial where soil chloride is low. Recent research has shown that chloride improves yield by increasing disease resistance in crops. Inc.
   </p>

   <a href="single-news.php" class="btn btn-success btn-success2 pl-3 ">View All <i class='ml-5 rrr fa fa-angle-right '></i></a>
 </div> --}}


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