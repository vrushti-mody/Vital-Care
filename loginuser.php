<?php
session_start();
   $host = "localhost";
        $user = "root";
        $pwd = "Vrudhi6298#";
        $db = "vital care";

        $mysqli = mysqli_connect($host, $user, $pwd, $db);
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemail =$_POST['email'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM login WHERE email = '$myemail' and password = '$mypassword' LIMIT 1";
      $result = mysqli_query($mysqli,$sql);
     $username="";
      
      $count = mysqli_num_rows($result);
       $row = mysqli_fetch_array($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
       
        $username=$row['username'];
          $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $myemail;
    $_SESSION['username']=$username;
    
    
        header('Location:home.php');
      }else {
       
        echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'><script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#myModal').modal('show');
    });
</script>";
       

      }
   }
?>












<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="jquery-3.3.1.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
    body {

        color: #999;
        background: #f3f3f3;
        font-family: 'Roboto', sans-serif;
    }
    .form-control {
        border-color: #eee;
        min-height: 41px;
        box-shadow: none !important;
    }
    .form-control:focus {
        border-color: #5bc0de;
    }
    .form-control, .btn {        
        border-radius: 3px;
    }
    .signup-form {
        width: 500px;
        margin: 0 auto;
        padding: 30px 0;
    }
    .signup-form h2 {
        color: #333;
        margin: 0 0 30px 0;
        display: inline-block;
        padding: 0 30px 10px 0;
        border-bottom: 3px solid #5bc0de;
    }
    .signup-form form {
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form .form-group {
        margin-bottom: 20px;
    }
    .signup-form label {
        font-weight: normal;
        font-size: 13px;
    }
    .signup-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .signup-form .btn {        
        font-size: 16px;
        font-weight: bold;
    
        border: none;
        margin-top: 20px;
        min-width: 140px;
    }
    .signup-form .btn:hover, .signup-form .btn:focus {
       
        outline: none !important;
    }
    .signup-form a {
        color: #5bc0de;
        text-decoration: underline;
    }
    .signup-form a:hover {
        text-decoration: none;
    }
    .signup-form form a {
        color: #5bc0de;
        text-decoration: none;
    }   
    .signup-form form a:hover {
        text-decoration: underline;
    }
    /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}


body.modal-open div.modal-backdrop { 
    z-index: 0; 
}
</style>
</head>
<body>
<div class="signup-form">
    <form action="" method="post" class="form-horizontal">
        <div class="col-xs-8 col-xs-offset-4">
            <h2>  Log In</h2>
        </div>      
        <div class="form-group">
            <label class="control-label col-xs-4">Email Address</label>
            <div class="col-xs-8">
                <input type="email" class="form-control" name="email" required="required">
            </div>          
        </div>
        <div class="form-group">
            <label class="control-label col-xs-4">Password</label>
            <div class="col-xs-8">
                <input type="password" class="form-control" name="password" required="required">
            </div>          
        </div>
        <div class="form-group">
            <div class="col-xs-8 col-xs-offset-4">
                <button type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Login</button>
                <input type="Hidden" name="check" value="hi">
            </div>  
        </div>            
    </form>
    <div class="text-center">New to our page? <a href="signupuser.php">Sign Up here</a> or <a href="adminlogin.php">Login as an Admin</a></div>
</div>

 <div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
                <p>There was a problem</p>
                <p class="text-warning"><small>Your username password is incorrect.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
            </div>
        </div>
    </div>
</div>

</body>
</html>                    