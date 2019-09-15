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
    <title>About Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="aboutus.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<style type="text/css">
  /*footer*/
  .social i:hover{
  color:#009999;
  font-size:  30px;
}



</style>
</head>
<body>
    <header style="background-color:white;">
<nav class="navbar navbar-expand-lg navbar-light">
<a href="#" class="navbar-brand ml-3">Vital Care</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
aria-control="#navbarMenu" aria-expanded="false" aria-label="Toggle Navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse"></div>
<div class="collapse navbar-collapse" id="navbarMenu">
<ul class="navbar-nav mr-auto">
<li class="nav-item ">
<a href="home.php" class="nav-link">HOME</a>
</li>
 <li class="nav-item ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PRODUCTS
        </a>
        <div class="dropdown-menu nav-item " aria-labelledby="navbarDropdown">
          <a class="dropdown-item nav-link" href="healthandfitness.php">HEALTH AND FITNESS</a>
          <a class="dropdown-item nav-link" href="personalcare.php">PERSONAL CARE</a>
          <a class="dropdown-item nav-link" href="homeopathy.php">HOMEOPATHY</a>
           <a class="dropdown-item nav-link" href="ayurveda.php">AYURVEDA</a>
          <a class="dropdown-item nav-link" href="products.php">ALL PRODUCTS</a>

        </div>
 </li>

<li class="nav-item">
<a href="home.php#trending2" class="nav-link">TRENDING</a>
</li>
<li class="nav-item">
<a href="viewblogs.php" class="nav-link">WELLNESS ADVICE</a>
</li>
<li class="nav-item dropdown active">
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
 
<div class="container" >
    <div class="row">
         <div class="col-md-6">
         <img class="image" src="story1.jpg" style="height: 390px;">
        </div>
        <div class="col-md-6">
        <h1>Our Story</h1>
         <p><i> 
        In a world marred by 'Tyranny of choice', unsustainable discounts, similar looking mass produced products, and mechanical shopping, Vital Care is like a breath of fresh air. We bring the joy, emotions, and serendipity back in your shopping.<br>
        <br>
        Adapting to the perpetually changing technological and dimensional needs of the customers, Vital Care is meant to benefit different segments of the Indian society, benefiting them with the advantages of the e-Commerce retailing <br>
        <br>
        Vital Care is a curated marketplace that exhibits and sells natural & sustainable products from passionate sellers across the country. We are your partners in your journey to a cleaner, safer, healthier, and sustainable living. We deliver everything to your doorstep at honest prices.</i></p>
        </div>
     </div>
      <div class="row">
        <div id="secondary-content">
        <div class="wrapper">
        <div class="col-md-5">
        <article style="background-image: url('admin.jpg');">
            <div class="overlay">
                <h4>VISION</h4>
                <p><small>Help consumers make the switch to a natural and sustainable lifestyle and achieve excellence in our relationships, products, services with best business practices and ethics.</small></p>
            </div>
        
        </article>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
        <article style="background-image: url('admin.jpg');">
            <div class="overlay">
                <h4>MISSION</h4>
                <p><small>To give customers the most compelling shopping experience possible. We strive to deliver happiness to all - customers and employees.</small></p>   
            </div>
        </article>
        </div>
        <div class="clear">
            
        </div>
    </div>
    </div>
     </div>
        <center><h1>What makes us different?</h1></center> 
        <br>
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <center>  <i class="fa fa-balance-scale fa-5x" aria-hidden="true" ></i></center>
      <h3>Curated Marketplace</h3>
      <p style="text-align: justify;">We love helping clients break their market's boundaries.  We give sellers the platform to sell their products to a larger audience and clients to choose from a range of products. Vital Care is a one stop shop for health or wellness.</p>
    </div>
    <div class="col-md-3">
      <center>  <i class="fa fa-magic fa-5x" aria-hidden="true"></i></center>
      <h3>CREATIVE AND ANALYTICAL</h3>
      <p style="text-align: justify;">We are very creative but at the same time we are very analytical as we believe that e-commerce is more than just an art, it’s a science. We know that people like people, so we try turning our science into an emotive experience. </p>
    </div>
    <div class="col-md-3">
      <center>  <i class="fa fa-laptop fa-5x" aria-hidden="true"></i></center>
      <h3>TECHNICAL BUT MARKETING DRIVEN</h3>
      <p style="text-align: justify;">Our team includes highly skilled software engineers who are involved in every aspect of the projects that we undertake. Notably, our projects are never technology driven but always guided by realistic business objectives.</p>
      
    </div>
    <div class="col-md-3">
     <center>   <i class="fa fa-heart fa-5x" aria-hidden="true"></i></center>
      <h3>WE LOVE SHARING OUR KNOWLEDGE</h3>
      <p style="text-align: justify;">We share our knowlege with our clients in the form of reviews and blogs. This is because we believe that working in synergistic partnership with others forms incredible relationships capable of achieving great things.</p>
    </div>
  </div>
  </div>
  <br>
   <center><h1>Our Team</h1></center> 
   <br>
     <div class="container">

                        <div class="col-md-3 col-sm-3">
                            <div class="team-member">
                                <div class="team-img">
                                    <img src="vidhi.jpg" alt="team member" class="img-responsive">
                                </div>
                                <div class="team-hover">
                                    <div class="desk">
                                        <h4>BE YOU</h4>
                                        <p>If they want to call you crazy,fine. Show them what crazy can do.</p>
                                    </div>
                                    <div class="s-link">
                                        <a href="https://www.linkedin.com/in/vidhi-mody-21629a150"><i class="fa fa-linkedin"></i></a>
                                        
                                        <a href="https://twitter.com/vidhi_mody?s=09"><i class="fa fa-twitter"></i></a>
                                         <a href="https://www.instagram.com/vidhi_mody/"><i class="fa fa-instagram"></i></a>
                                       <a href="https://www.facebook.com/vidhi.mody.3"><i class="fa fa-facebook"></i></a>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="team-title">
                                <h5>Vidhi Mody</h5>
                                <span>founder &amp; ceo</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="team-member">
                                <div class="team-img">
                                  <center><img src="Vidhi.jpg" alt="team member" class="img-responsive" style="height: 400px; width: 400px;"></center>
                                    
                                </div>
                               
                            </div>
                            
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="team-member">
                                <div class="team-img">
                                    <img src="Vrushti.jpg" alt="team member" class="img-responsive" >
                                </div>
                                <div class="team-hover">
                                    <div class="desk">
                                        <h4>WORK HARD</h4>
                                        <p>I never dreamed about success. I worked for it.</p>
                                    </div>
                                    <div class="s-link">
                                        <a href="https://www.linkedin.com/in/vrushti-mody-b2a208165"><i class="fa fa-linkedin"></i></a>
                                        
                                        <a href="https://twitter.com/Vrushti_Mody?s=09"><i class="fa fa-twitter"></i></a>
                                         <a href="https://www.instagram.com/vrushti_mody/"><i class="fa fa-instagram"></i></a>
                                       <a href="https://www.facebook.com/vrushti.mody"><i class="fa fa-facebook"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-title">
                                <h5>Vrushti Mody</h5>
                                <span>founder &amp; ceo</span>
                            </div>
                        </div>

                    </div>

                </div>
                <footer>
  <div class="social" style="margin:2%;">
  <div class="d-flex flex-row justify-content-center">
  <a href="https://www.facebook.com/bhavi.mody"><i class="fab fa-facebook-f m-4"></i></a>
  <a href="https://twitter.com/DrBhaviMody"><i class="fab fa-twitter m-4"></i></a>
  <a href="https://www.youtube.com/channel/UCL3MVoSqec04BuqgafndKIA"><i class="fab fa-youtube m-4"></i></a>
  <a href="https://www.instagram.com/vrudhi_drbhavi/"><i class="fab fa-instagram m-4"></i></a>
  </div>
  </div>
  <hr>
  <center><h5 style="color:#009999">Vital Care &copy;</h5></center>
</footer>
    
   

</body>
</html>