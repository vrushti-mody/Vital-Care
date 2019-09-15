
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

$dynamicList = "";

  //Displaying all products
$sql = "SELECT * FROM blog";
$result = mysqli_query($mysqli,$sql);
$productCount = mysqli_num_rows($result); // count the output amount
if ($productCount > 0) {
  while($row = mysqli_fetch_array($result)){ 
       $id = $row["id"];
       $title = $row["title"];
       $author = $row["author"];
       //Retrieving the product
       $dynamicList.= "<div class='container1'>
    <div class='row'>
    <div class='col-lg-12 col-md-10 mx-auto'>
        <div class='post-preview'>
         <a href='readblog.php?id=" . $id . "'' >
            <h3 class='post-title'>".$title."
            </h3>
          </a>
          <p class='post-meta'>Article by:  &nbsp".$author."
          </p>
        </div>
      </div>
    </div>
  </div>";


       
    
} 
}
else {
  $dynamicList = "We have no blogs yet";
}

?>




<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Wellness Blogs</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/blogtitle.css" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Battambang' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Graduate' rel='stylesheet'>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  .social i:hover{
  color:#009999;
  font-size:  30px;
}
</style>

</head>

<body>


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
<li class="nav-item">
<a href="home.php" class="nav-link">HOME</a>
</li>
 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          CATEGORIES
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
<a href="home.php#trending2" class="nav-link">TRENDING</a>
</li>
<li class="nav-item active">
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

<div class="container">
  <img src="blog.jpg" alt="Avatar" class="image">
  <div class="overlay">
    <div class="text">WELLNESS BLOGS</div>
  </div>
</div>
  <br>
  <!-- Main Content -->
  <?php echo $dynamicList ?>

  <hr>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>
      <footer>
  <div class="social" style="margin:2%;">
  <div class="d-flex flex-row justify-content-center">
  <a href="https://www.facebook.com/bhavi.mody"><i class="fab fa-facebook-f m-4" ></i></a>
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
