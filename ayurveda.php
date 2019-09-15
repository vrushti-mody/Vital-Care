
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
if(isset($_POST['name'])) //For Search Bar
{
  $search=$_POST['name'];
  $sql="SELECT * FROM products WHERE (LOCATE('$search',product_name)>0 OR  LOCATE('$search',details)>0 OR  LOCATE('$search',category)>0 AND category='AYURVEDA') ";
  $result = mysqli_query($mysqli,$sql);
  $productCount = mysqli_num_rows($result); 
  if ($productCount > 0) {
    while($row = mysqli_fetch_array($result)){ 
       $id = $row["id"];
       $product_name = $row["product_name"];
       $price = $row["price"];
      //Retrieving the products
       $dynamicList.= '<div class="col-md-4" style="margin-top:20px; margin-bottom:20px; "><div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); max-width: 300px; margin: auto; text-align: center; font-family: arial; background:white;">
         <img src="inventory_images/' . $product_name . '.jpg" " alt="'.$product_name.'" style="width:100px; height:100px;" class="img-rounded">
         <h1>'. $product_name.' </h1>
         <p class="price" style="color: grey; font-size: 22px;">Rs: '.$price.' </p>
         <p><a href="productdesc.php?id=' . $id . '" class="btn btn-info btn-block btn-lg">View Product Details</a></p>
         
         </div></div>';
}
}
else {
  $dynamicList = "No results were found for your search!";
}
  
}
else
{
  //Displaying all products
$sql = "SELECT * FROM products WHERE category='AYURVEDA'";
$result = mysqli_query($mysqli,$sql);
$productCount = mysqli_num_rows($result); // count the output amount
if ($productCount > 0) {
	while($row = mysqli_fetch_array($result)){ 
       $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
       //Retrieving the product
       $dynamicList.= '<div class="col-md-4" style="margin-top:20px; margin-bottom:20px; "><div class="card" style="max-width: 300px; margin: auto; text-align: center; font-family: arial; background:white;">
         <img src="inventory_images/' . $product_name . '.jpg" " alt="'.$product_name.'" style="width:100%; height:250px;" class="img-rounded">
         <h3>'. $product_name.' </h3>
         <p style="color: grey; font-size: 14px;">Rs: '.$price.' </p>
         <p><a href="productdesc.php?id=' . $id . '" class="btn btn-info">View Product Details</a></p>
         </div></div>';
		
} 
}
else {
	$dynamicList = "<div class='col-md-12'><center><br><br><br>We have no products listed in our store yet!</center></div>";
}
}

?>
<!DOCTYPE html >
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
<title>Store Home Page</title>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Lato|Pacifico|Righteous|Roboto+Condensed|Ubuntu');
@import url('https://fonts.googleapis.com/css?family=Rock+Salt');
html,body{
  padding: 0%;
  margin: 0%;
  font-family: 'Lato';
  width: 100%;
  height: 100%;
}
/*Carousel*/
.carousel .item {
  height: 300px;
}

.item img {
    position: absolute;
    top: 0;
    left: 0;
    min-height: 300px;
}

  .bottom-left {
  font-family: 'Roboto', sans-serif;
  position: absolute;
  top: 30px;
  left: 50px;
}
/*Navigation Bar*/
.navbar-brand{
  background: linear-gradient(to right, #30CFD0 0%, #330867 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-family: 'Pacifico';
  font-size: 30px;
}

.nav-link{
  font-size: 16px;
  margin: 20px;
  color: black !important;
  font-family: 'Roboto Condensed';
}
.nav-link:hover{
  color: #009999 !important;
}

.active .nav-link{
  color: #009999 !important;
}

.menu-right-btn{
  padding: 10px 20px;
  margin-right: -4%;
  margin-left: 10px;
  background-color: transparent;
  transition: all 300ms ease-in;
  border-radius: 15px;
}

.menu-right-btn:hover{
  color:white;
  background-color: #009999;
}


  body
  {
    background-image: "productbg.jpg";
  }
  @import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 100%;
  
}

.searchTerm {
  float: left;
  width: 100%;
  border: 3px solid #00B4CC;
  padding: 5px;
  height: 36px;
  border-radius: 5px;
  outline: none;
  color: #9DBFAF;
}

.searchTerm:focus{
  color: #00B4CC;

}

.searchButton {
  position: absolute;  
  right: -50px;
 
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  font-size: 20px;
}

.wrap{
  width: 30%;
  position: absolute;
  left: 50%;
  transform: translate(-50%, -50%);
}
.social i:hover{
  color:#009999;
  font-size:  30px;
}
</style>
</head>
<body style="background-color:#f2f2f2;">
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
 <li class="nav-item dropdown active">
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
  <center>
     <h1 align="center" style="font-family: Palatino; font-size: 4rem;">Our Products</h1>
      <br>
      <br>
    <div class="wrap">
   <div class="search">
    <form action="" method="POST">
      <input type="text" class="searchTerm" placeholder="What are you looking for?" id="name" name="name">
      <button type="submit" class="searchButton">
        <i class="fa fa-search" aria-hidden="true"></i>
     </button>
     </form>
   </div>
</div>
  <div class="container" >
  
    <br>
    <div class="row">
      <?php echo $dynamicList; ?> <!-- Printing the products -->
    </div>
  </div>
</center>
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