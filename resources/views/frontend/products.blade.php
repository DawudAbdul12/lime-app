<!doctype html>
<html lang="en">
<head>
  <title>OmniFert | Products</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  @php $page = "product" @endphp
  <!-- include navigation -->
  @include("frontend.includes.navigation")
  <!-- include navigation -->

<!-- top slider section -->
  <section class="project centeritem">
    <div class="container ">
      <div class="row ">
        <div class="col-12 col-md-8 ">
            <img src="img/facedown.svg" alt="" class="facedownlefttt d-none d-sm-block">
          <h1 class="display-4 wc">
            Our <br>  <strong>Products</strong> </h1>
        </div>
      </div>
      
    </div>
  </section>


  <!-- our products  -->
  <section class="greenback">
    <div class="container">
      <div class="row ">
        <div class="col-12 col-md-5  mb-4">
         <p class="wc">We aim to improve agriculture productivity in Africa with the provision of high quality fertilizer at the right price to smallholder and commercial farmers.</p>
       </div>

       <div class="row" style="margin-left:0; margin-right:0;">
          @foreach ($products as $product)
              
            <div class="col-6 col-md-4 mb-5 pb-5 centeritem2">
             <a href="/product/{{$product->slug}}">
             
                <div class="col-md-5 col-12 prod_img">
                  <img src="{{ asset('product_images/'.$product->pic)}}" class="img-fluid rounded-circle2 " alt="{{ $product->name}}">
                </div>
                <div class="col-md-5 col-12">
                  <div class="wc mb-3">
                    <h5 class="p_name"><strong>{{ $product->name}}</strong> </h5>
                    {{-- <p class="mb-0 product-mini "> {!! limit_text($product->content, 100) !!}</p> --}}
                    {{-- <p class="mb-0 product-mini "> EINECS No.: 200-315-5</p>
                    <p class="mb-0 product-mini "> Formula: CH4N2 Molecular</p>
                    <p class="mb-0 product-mini ">Weight: 60.06</p> --}}
                  
                  </div>
                  <a href="/product/{{$product->slug}}"><span class="badge badge-pill badge-omni2 py-2 px-3">See More</span></a>
                </div>
              </div>
             </a>
            

          @endforeach
        </div>


    </div>

   

  </div>
</section>

<!-- our products  -->


<!-- footer includes -->
@include("frontend.includes.footer")
<!-- footer includes -->

</body>
</html>