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
          if(isset($_POST['go']))
          {
            $name=$_POST['name'];
             $email=$_POST['email'];
              $message=$_POST['message'];
               $sql = "INSERT INTO contactus (name,email,message)
    VALUES ('$name', '$email','$message')";
  echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'><script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#myModal').modal('show');
    });
</script>";
  // If query is successful  
  if (mysqli_query($mysqli, $sql)) {

      echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'><script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#myModal').modal('show');
    });
</script>";
  }
  




    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
          }
?>



<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="contactus.css">
  <style type="text/css">
  .social i:hover{
  color:#009999;
  font-size:  30px;
}
  </style>
</head>
<body style="background-color:#f2f2f2;" >
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
<a href="home.php#trending2" class="nav-link">TRENDING</a>
</li>
<li class="nav-item">
<a href="viewblogs.php" class="nav-link">WELLNESS ADVICE</a>
</li>
<li class="nav-item">
<a href="aboutus.php" class="nav-link">ABOUT US</a>
</li>
<li class="nav-item active">
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
 <div>
 	<center>
 	   <img src="contact-us.jpg" style="width: 95%; background-color:#f2f2f2;">
 	</center>
</div>
<div class="container-fluid" style="background-color: #f2f2f2; padding-right: 20px; padding-left: 20px;" >
	     <div class="col-md-7 " id="form_container" style="margin-left: 20px">
	     	<br>
	     	<br>
                    <h1 style="font-size: 30px">Get in Touch</h1> 
                    <p style="font-size: 15px"> Swing by for a cup of coffee, or leave us a message! </p>
                    <form role="form" method="post" action="">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name" style="font-size: 15px"> Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email" style="font-size: 15px"> Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="message"style="font-size: 15px" > Message:</label>
                                <textarea class="form-control" type="textarea" id="message" name="message" maxlength="6000" rows="7" placeholder="Write your message here..."></textarea>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button id="myBtn" name="go" type="submit" class="btn btn-lg btn-info btn-lg pull-left" style=" font-size: 16px;">Submit &rarr;
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                	 <br>
                	 <br>

                        <h4 style="font-size: 25px">Connect with us:</h4>
                        <p style="font-size: 15px">For support or any questions:<br>Email us at: bhavidm@gmail.com</p>
                        <br>
                        <h5 style="font-size: 20px"><b>Vital Care</b></h5>
                        <p style="font-size: 15px">576/A Siddhivinayak <br>Seth B.N.Road<br>Matunga(East)<br>Mumbai-400019</p>
                        <br>
                        <h5 style="font-size: 20px"><b>Call</b></h5>
                        <p style="font-size: 15px">+91 9819819739<br>022 24150661</p>     
                	
                </div>
</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            
                <h4 class="modal-title">Notification</h4>
            </div>
            <div class="modal-body">
                <p>Your message was sent!</p>
                <p style="color: #5bc0de"><small>Our team will get in touch with you soon.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
    
            </div>
        </div>
    </div>
</div>
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