<?php 
session_start();

$host = "localhost";
        $user = "root";
        $pwd = "Vrudhi6298#";
        $db = "vital care";

$mysqli = mysqli_connect($host, $user, $pwd, $db); 
if(isset($_POST['cart']))
        {
          header("Location: cart.php");
        }
        if(isset($_POST['login']))
        {
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
          $_SESSION['loggedin']=false;
            header("Location:loginuser.php");
          } 
          else
          {
            header("Location:loginuser.php");
          } 
          } 
?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <title>Homepage</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
  <link rel="stylesheet" href="trending.css">
  <script src='https://code.jquery.com/jquery-1.12.4.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js'></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


      <!-- <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script> -->
    
<!--   <script>
  window.console = window.console || function(t) {};
</script>
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script> -->
</head>
  <header>
<nav class="navbar navbar-expand-lg navbar-light">
<a href="#" class="navbar-brand ml-3">Vital Care</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
aria-control="#navbarMenu" aria-expanded="false" aria-label="Toggle Navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse"></div>
<div class="collapse navbar-collapse" id="navbarMenu">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a href="home.php" class="nav-link">HOME</a>
</li>
 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PRODUCTS
        </a>
        <div class="dropdown-menu nav-item" aria-labelledby="navbarDropdown">
           <a class="dropdown-item nav-link" href="healthandfitness.php">HEALTH AND FITNESS</a>
          <a class="dropdown-item nav-link" href="personalcare.php">PERSONAL CARE</a>
          <a class="dropdown-item nav-link" href="homeopathy.php">HOMEOPATHY</a>
           <a class="dropdown-item nav-link" href="ayurveda.php">AYURVEDA</a>
          <a class="dropdown-item nav-link" href="products.php">ALL PRODUCTS</a>
        </div>
 </li>

<li class="nav-item">
<a href="#trending2" class="nav-link">TRENDING</a>
</li>
<li class="nav-item">
<a href="viewblogs.php" class="nav-link">WELLNESS ADVICE</a>
</li>
<li class="nav-item">
<a href="aboutus.php" class="nav-link">ABOUT US</a>
</li>
<li class="nav-item">
<a href="contact_us.php" class="nav-link">CONTACT US</a>
</li>
</ul>

<form class="form-inline my-2 my-lg-0" method="POST" action="">
<button class="btn menu-right-btn border" name="login" type="submit">
<i class="fa fa-user" aria-hidden="true"></i>
</button></a>
</form>
<form class="form-inline my-2 my-lg-0"  method="POST" action="">
<button class="btn menu-right-btn border" name="cart" type="submit">
<i class="fa fa-shopping-cart" aria-hidden="true"> Cart</i>
</button></a>
</form>
</div>
</nav>
</header>
<body>
<div class="container-fluid p-0">
<a id="home"></a>
<div class="site-content">
<div class="d-flex justify-content-center">
<div class="d-flex flex-column">
<h1 class="site-title"><br><br></h1>
<p class="site-desc"><br><br><br><br><br><br><br><br><br><br><br></p>

<div class="d-flex flex-row">

</div>
</div>
</div>
</div>
</div>
<br>

<div class="container">
  <a id="trending2"><center><h1 class="heading-2">Trending Now</h1></center></a>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner row w-100 mx-auto">
      <div class="carousel-item col-md-4 active">
        <div class="card">
          <img class="card-img-top img-fluid" src="serum.jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">BEAUTY FLUID AYURVEDIC NIGHT SERUM</h4>
            <p class="card-text">An Ayurvedic night serum made with the legendary Kumkumadi oil prescribed for dull, pigmented, damaged and aging skin.</p>
          </div>
             <a href="productdesc.php?id=4" class="btn btn-info">
            Buy Now
          </a>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="Skincare_serum.jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">AYURVEDIC VITAMIN C SKIN CARE SERUM </h4>
            <p class="card-text">A proprietary blend that will help you fight multiple signs of ageing and maintain a healthy, youthful complexion much longer into the future.</p>
          </div>
             <a href="productdesc.php?id=3" class="btn btn-info">
            Buy Now
          </a>
        </div>
      </div>
         <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="fit2.jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">OPTIMUM NUTRITION ESSENTIAL AMINO ENERGY, Blueberry Mojito</h4>
            <p class="card-text">Easy to Mix Anytime Energy Powder with Amino Acids.</p>
          </div>
             <a href="productdesc.php?id=2" class="btn btn-info">
            Buy Now
          </a>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="fitness.jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">OPTIMUM NUTRITION INSTANTIZED BCAA CAPSULES</h4>
            <p class="card-text">Take your training efforts to the next level by supporting endurance and recovery.</p>
          </div>
             <a href="productdesc.php?id=1" class="btn btn-info">
            Buy Now
          </a>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="pc2.jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">PARK AVENUE LUXURY GROOMING COLLECTION KIT</h4>
            <p class="card-text">A pleasing and long lasting fragrance with a unique formula enriched with skin moisturizers helps protect your skin from razor burns.</p>
          </div>
          <a href="productdesc.php?id=5" class="btn btn-info">
            Buy Now
          </a>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="pc.jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">L'OREAL PARIS WHITE PERFECT CLINICAL LOTION</h4>
            <p class="card-text">It's most concentrated whitening essence water to activate skin regeneration, to help remove spots and reveal a new fair skin. </p>
          </div>
             <a href="productdesc.php?id=6" class="btn btn-info">
            Buy Now
          </a>
        </div>
      </div>
      <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="homeo.jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">ARNICA MONTANA PILLS</h4>
            <p class="card-text">A homeopathic remedy commonly used for bruises and muscle soreness. Indicated for Bruises, Boils, Jet lag.</p>
          </div>
              <a href="productdesc.php?id=7" class="btn btn-info">
            Buy Now
          </a>
        </div>
      </div>
        <div class="carousel-item col-md-4">
        <div class="card">
          <img class="card-img-top img-fluid" src="homeo2.png" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">ALLIUM CEPA PILLS</h4>
            <p class="card-text">A homeopathic remedy often used to treat head colds, hay fever, coughs, headaches and hoarseness.</p>
          </div>
             <a href="productdesc.php?id=8" class="btn btn-info">
            Buy Now
          </a>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="section-1">
<a id="features"></a>
<div class="container text-center">
<!-- <h1 class="heading-1">Fantastic Feeatures</h1> -->
<br>
<br>
<h1 class="heading-2">Search By Category</h1>

<div class="row justify-content-center text-center">
<div class="col-md-4">
<div class="card">
<div class="card-body">
<h4 class="card-title">Health & Fitness</h4>
</div>
<a href="healthandfitness.php"><img src="handf.jpg" class="card-img-top"></a>
</div>
</div>
<div class="col-md-4">
<div class="card">
<div class="card-body">
<h4 class="card-title">Personal Care</h4>
</div>
<a href="personalcare.php"><img src="personal_care.jpg" class="card-img-top"></a>
</div>
</div>
</div>
<br>
<div class="row justify-content-center text-center">
<div class="col-md-4">
<div class="card">
<div class="card-body">
<h4 class="card-title">Homeopathy</h4>
</div>
<a href="homeopathy.php"><img src="homeopathy.jpeg" class="card-img-top"></a>
</div>
</div>
<div class="col-md-4">
<div class="card">
<div class="card-body">
<h4 class="card-title">Ayurveda</h4>
</div>
<a href="ayurveda.php"><img src="ayurveda.jpg" class="card-img-top"></a>
</div>
</div>

</div>

</div>
</div>
<!-- Special Discount -->
<center><h4>Get special discount code in your inbox</h4></center>
<div class="form-inline justify-content-center">
<input type="email" name="Email" id="email" placeholder="Enter your email id" size="40" class="form-control px-4 py-2">
<button type="button" class="btn btn-info px-4 py-2">SEND</button>
</div>

<footer>
  <div class="social" style="margin:2%;">
  <div class="d-flex flex-row justify-content-center">
  <i class="fab fa-facebook-f m-4"></i>
  <i class="fab fa-twitter m-4"></i>
  <i class="fab fa-youtube m-4"></i>
  <i class="fab fa-instagram m-4"></i>
  </div>
  </div>
  <hr>
  <center><h5 style="color:#009999">Vital Care &copy;</h5></center>
</footer>

    <script id="rendered-js" >
$(document).ready(function() {
  $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });
});
    </script>
</body>

</html>