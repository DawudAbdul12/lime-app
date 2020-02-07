<!DOCTYPE html>
<html lang="en">
<head>
<title>OmniFert | Single Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  @php $page = "product" @endphp

  <!-- include navigation -->
  @include("frontend.includes.navigation") 
  <!-- include navigation -->

</head>
<body>
<!-- top slider section -->
  <section class="project centeritem" style="background: linear-gradient( rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.32) 100%), url({{ asset('product_images/'.$product->pic)}});">
    <div class="container ">
      <div class="row ">
        <div class="col-12 col-md-8 ">
            <img src="img/facedown.svg" alt="" class="facedownlefttt d-none d-sm-block">
          <h1 class="display-4 wc">
          <strong>{{ $product->name }}</strong> </h1>
        </div>
      </div>
      
    </div>
  </section>

<!-- Product description -->
  <section class="prod_description">
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-6 col-12" style="padding:8% 7%;">
        {!! $product->content !!}

        {{-- <p>
        Potassium chloride (commonly referred to as Muriate of Potash or MOP) is the most common potassium source used in agriculture, accounting for about 95% of all potash fertilisers used worldwide.
        </p>
        <p>Its nutrient composition is approximately:</p>
        <h6><strong>POTASSIUM.:</strong> 50%</h6>
        <br>
        <h6><strong>CHLORIDE.:</strong> 46%</h6> <br>
        <p>MOP has a high nutrient concentration and is therefore relatively price competitive with other forms of potassium. The chloride content of MOP can also be beneficial where soil chloride is low. Recent research has shown that chloride improves yield by increasing disease resistance in crops. In circumstances where soil or irrigation water chloride levels are very high, the addition of extra chloride with MOP can cause toxicity. However, this is unlikely to be a problem, except in very dry environments, since chloride is readily removed from the soil by leaching.</p>
      </div>

      <div class="col-md-6 col-12" style="padding-top:4%; padding-right:3%; padding-left:0;">
      <img src="img/mop.png" alt="">
      </div> --}}

      </div>
      <div class="col-md-6 col-12 centeritem prod_single" style="padding:8% 7%;">
          <img src="{{ asset('product_images/'.$product->pic)}}" class="img-fluid" alt="{{ $product->name}}">

      </div>
    </div> 
  </section>

  <section class="some-products" style="background-color: #1E8301;">
    <div class="container-fluid">
    <h1 class="display-4 wc" style="font-size:38px!important; padding-top:4%; padding-left:6%; padding-bottom:4%;">
      Some Of Our <strong>Products</strong>
    </h1>
    <div class="row ">
       <div class="col-12">
         <div class="row ">

            @foreach ($products as $product)

                <div class="col-12 col-md-4 centeritem mb-5 pb-5">
                  <a href="/product/{{$product->slug}}">
                    <div class="row">
                      <div class="col-5">
                          <img src="{{ asset('product_images/'.$product->pic)}}" class="img-fluid rounded-circle2" alt="{{ $product->name}}">
                      </div>
                      <div class="col-7">
                        <div class="wc mb-3">
                            <h3><strong>{{ $product->name}}</strong> </h3>
                            <p class="mb-0 product-mini ">
                              {!! limit_text($product->content, 100) !!}
                            </p>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
          
            @endforeach
        
        </div>
      </div>
    </div>
  </section>

   

<!-- footer includes -->
@include("frontend.includes.footer") 
<!-- footer includes -->

</body>
</html>