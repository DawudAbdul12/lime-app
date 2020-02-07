    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}" >

    <link rel="stylesheet" href="{{ asset('plugins/animate.css')}}">

    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" >
    <!-- custom -->

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/lightbox2-master/dist/css/lightbox.css')}}">

    <link rel="stylesheet" href="{{ asset('plugins/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/owlcarousel/owl.theme.default.css')}}">

    <!-- google fonts used -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700|Open+Sans:300,400,700&display=swap" rel="stylesheet">
    <!-- google fonts used -->

    <!-- font-awesome fonts used  https://fontawesome.com/v4.7.0/ -->
    <link href={{ asset("plugins/font-awesome-4.7.0/css/font-awesome.min.css")}} rel="stylesheet" type="text/css"> 
    <!-- font-awesome fonts used  https://fontawesome.com/v4.7.0/ -->


  </head>
  <body>
    
      @php
          function limit_text($text, $limit){
          
            $str = strip_tags($text);
            if (strlen($str) > $limit) {
                $str = substr($str, 0, $limit) . " ...";
                return $str;
            } elseif (strlen($str) <= $limit) {
                return $str;
            }
          }    
      
      @endphp

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
 <a href="index.php"><img src="img/thinkmyilogo.png" class="img-fluid navbar-brand" width="104" height="68"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item active ">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about_us.php">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          What We Do
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="whatwedo.php">What We Do 1</a>
          <a class="dropdown-item" href="whatwedo.php">What We Do 2</a>
           <a class="dropdown-item" href="whatwedo.php">What We Do 3</a>
      </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="gallery.php">Gallery</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="update.php">News / Events</a>
      </li>
       

      <li class="nav-item">
        <a class="nav-link" href="contact_us.php">Contact Us</a>
      </li>
    
    </ul>
   
  </div>
  </div>
</nav> -->



    
<nav class="navbar-light  bg-light fixed-top d-none d-sm-block">
  <div class="container-fluid">
    <div class="row  centeritem ">
      <div class="col-2 px-5 logo-left-curve "> 
      <a href="/index"><img src="{{ asset('img/omnilogo.png')}}" width="90" class="text-center" alt=""></a>
    </div>

      <div class="col-10 col-md-10 white-bg text-right pr-5">
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link @if($page == 'index') active  @endif " href="/index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if($page == 'about') active  @endif" href="/about-us">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link @if($page == 'product') active  @endif " href="/product">Products</a>
          </li>

           <li class="nav-item">
            <a class="nav-link @if($page == 'team') active  @endif " href="/team">Team</a>
          </li>

           <li class="nav-item">
            <a class="nav-link @if($page == 'news') active  @endif " href="/news">News</a>
          </li>

           <li class="nav-item">
            <a class="nav-link @if($page == 'gallery') active  @endif " href="/gallery">Gallery</a>
          </li>

           <li class="nav-item">
            <a class="nav-link @if($page == 'contact') active  @endif " href="/contact-us">Contact Us</a>
          </li>
         
        </ul>
      </div>
    </div>




  </div>
</nav>



<!-- mobile Drawer -->

<nav class="navbar-light  bg-www fixed-top d-md-block d-lg-none">
  <div class="container px-4 py-3">
    <div class="row centeritem ">
      <div class="col-4">
      <a href="/index"><img src="{{ asset('img/omnilogo.png')}}" width="70" class="text-center" alt=""></a>
      </div>
      <div class="col-8 text-right">
   <span style="cursor:pointer" onclick="openNav()">
     <img src="img/list-menu.svg" width="30" alt="">
   </span>
      </div>
    </div>
  </div>

</nav>

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="/index">Home</a>
     <a href="/about-us">About us</a>
    <a href="/team">Team</a>
    <a href="/product">Products</a>
    <a href="/news">News</a>
    <a href="/gallery">Gallery</a>
    <a href="/contact-us">Contact us</a>
  </div>
</div>

<!-- mobile Drawer -->



