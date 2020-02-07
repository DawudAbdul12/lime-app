    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" >

    <link rel="stylesheet" href="{{ asset('plugins/animate.css') }}">

    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
    <!-- custom -->

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/lightbox2-master/dist/css/lightbox.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owlcarousel/owl.theme.default.css') }}">

    <!-- google fonts used -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700|Open+Sans:300,400,700&display=swap" rel="stylesheet">
    <!-- google fonts used -->

    <!-- font-awesome fonts used  https://fontawesome.com/v4.7.0/ -->
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"> 
    <!-- font-awesome fonts used  https://fontawesome.com/v4.7.0/ -->


  </head>
  <body>

     
    


<nav class="navbar-light  bg-light fixed-top d-none d-sm-block">
  <div class="container-fluid">
    <div class="row  centeritem ">
      <div class="col-2 px-5 logo-left-curve "> 
      <a href="index.php"><img src="img/omnilogo.png" width="90" class="text-center" alt=""></a>
    </div>

      <div class="col-10 col-md-10 white-bg text-right pr-5">
        <ul class="nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about-us.php">About</a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="team.php">Team</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="news.php">News</a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="gallery.php">Gallery</a>
          </li>

           <li class="nav-item">
            <a class="nav-link" href="contact-us.php">Contact Us</a>
          </li>
         
        </ul>
      </div>
    </div>




  </div>
</nav>



<!-- mobile Drawer -->

<nav class="navbar-light  bg-www fixed-top d-sm-block d-md-none">
  <div class="container px-4 py-3">
    <div class="row centeritem ">
      <div class="col-4">
      <a href="#"><img src="img/omnilogo.png" width="70" class="text-center" alt=""></a>
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
    <a href="index.php">Home</a>
     <a href="about-us.php">About us</a>
    <a href="team.php">Team</a>
    <a href="products.php">Products</a>
    <a href="news.php">News</a>
    <a href="gallery.php">Gallery</a>
    <a href="contact-us.php">Contact us</a>
  </div>
</div>




<!-- mobile Drawer -->
