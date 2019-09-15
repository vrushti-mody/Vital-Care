<?php 
session_start(); // Start session first thing in script
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Connect to the MySQL database  


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
        	$_SESSION['loggedin']==false;
        		header("Location:loginuser.php");
        	}	
        	else
        	{
        		header("Location:loginuser.php");
        	}	
        	}	
       
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the product page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pid, "quantity" => 1));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pid, "quantity" => 1));
		   }
	}
	header("location: cart.php"); 
    exit();
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 2 (if user chooses to empty their shopping cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
	if(isset($_POST["adjustBtn"]))
	{
		$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
	if ($quantity >= 100) { $quantity = 99; }
	if ($quantity < 2) { $quantity = 2; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => (int)$quantity-1)));
				  } // close if condition
		      } // close while loop
	} // close foreach loop
	}
   if(isset($_POST["adjustBtn2"]))
	{
		$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
	if ($quantity >= 9) { $quantity = 9; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => (int)$quantity+1)));
				  } // close if condition
		      } // close while loop
	} // close foreach loop
	}
	
}
 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 5  (render the cart for the user to view on the page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cartOutput = "";
$_SESSION['itemquantity']="";
$cartOutput1 = "";
$_SESSION['bill']="";
 $_SESSION['totalprice']="";
$cartTotal = "";
$shipping="300";
$total="";
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
	$shipping=" ";
    $cartOutput = "<h4 align='center'>Your shopping cart is empty</h4>";
    $_SESSION['bill']="You have bought no items";

} else {
	// Start PayPal Checkout Button
	
	// Start the For Each loop
	$i = 0; 
    foreach ($_SESSION["cart_array"] as $each_item) { 
		$item_id = $each_item['item_id'];
		$sql = "SELECT * FROM products WHERE id='$item_id' LIMIT 1";
		$result = mysqli_query($mysqli,$sql);
		while ($row = mysqli_fetch_array($result)) {
			$product_name = $row["product_name"];
			$price = $row["price"];
			$details = $row["details"];
		}

		$pricetotal = $price * $each_item['quantity'];
		(int)$cartTotal=(int)$cartTotal+(int)$pricetotal;
		// Dynamic Checkout Btn Assembly
		$x = $i + 1;
		
		// Create the product array variable
		$product_id_array .= "$item_id-".$each_item['quantity'].","; 
		// Dynamic table row assembly
		$cartOutput .= "<tr class='row'>";
		$cartOutput .= '<td class="col-md-3"><img src="inventory_images/' . $product_name . '.jpg" alt="' . $product_name. '" width="80%" height="100px" border="1" /></td>';
		$cartOutput .= '<td class="col-md-3"><a href="productdesc.php?id=' . $item_id . '" style=" font-size: 14px; color: black; text-decoration: none; color: black;">' . $product_name . '</a></td>';
		$cartOutput .= '<td class="col-md-2">' . $price . '</td>';
		$cartOutput .= '<td class="col-md-2"><form action="cart.php" method="post">
		<input name="quantity" type="hidden" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
		
		<button type="submit" class="btn btn-outline-info btn-sm" style="display:inline-block;  " name="adjustBtn"><strong>-</strong></button>
		 <p for="details" style="display:inline-block; ">'.$each_item['quantity'].'</p>
		<button type="submit"  class="btn btn-outline-info btn-sm" style="display:inline-block; " name="adjustBtn2"><strong>+</strong></button>
		<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		</form></td>';
		// $cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
		$cartOutput .= '<td class="col-md-1">' . $pricetotal . '</td>';
		$cartOutput .= '<td class="col-md-1"><form action="" method="post">
		<button name="deleteBtn" class="btn btn-danger btn-sm" type="submit" style="font-size: 0.8em;">Remove</button>
		
		<input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
		$cartOutput .= '</tr>';


		$cartOutput1 .= "<tr class='row'>";
		$cartOutput1 .= '<td class="col-md-2"><a href="productdesc.php?id=' . $item_id . '" style=" font-size: 14px; color: black; text-decoration: none; color: black;">' . $product_name . '</a></td>';
		$cartOutput1 .= '<td class="col-md-4">' . $details . '</td>';
		$cartOutput1 .= '<td class="col-md-2">' . $price . '</td>';
		$cartOutput1 .= '<td class="col-md-2">'.$each_item['quantity'].'</td>';
		//$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
		$cartOutput1 .= '<td class="col-md-2">' . $pricetotal . '</td>';
		$cartOutput1 .= '</tr>';
		$_SESSION['itemquantity'].="".$product_name."&nbsp;x&nbsp;".$each_item['quantity']."<br>";
		$i++; 
    } 

	$total= (int)$cartTotal+(int)$shipping;
    // Finish the Paypal Checkout Btn
    $_SESSION['bill']=$cartOutput1;
    $_SESSION['totalprice']=$total;
    $_SESSION['itemquantity'].="<br><br>";
	
}
}
else {
	$cartOutput="";

	 $cartTotal="";
	 $shipping="";
	 $total="";
	  $_SESSION['bill']='Sad';

    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'><script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#myModal').modal('show');
    });
</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Your Cart</title>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
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
  text-align: left;
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
body.modal-open div.modal-backdrop { 
    z-index: 0; 
}
	body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #333;
	line-height:1.5em;
}

#pageHeader {
	
	border-bottom:none;
	background-color:#F4F4F4;
	width:900px;
	
}
#pageContent {
	
	border-bottom:none;
	background-color:#F4F4F4;
	width:900px;

}
#pageFooter {
	
	background-color:#F4F4F4;
	width:900px;
	
}

  .totals-item {
    float: right;
    clear: both;
    width: 100%;
    margin-bottom: 10px;
	}
    
    
    
    .totals-value {
      float: right;
      width: 7%;
      text-align: right;
    }

  
  .totals-item-total {
    font-family: $font-bold;
  }
</style>
</head>
<body background="inventorybg.jpg">
	<header style="background-color:white;">
<nav class="navbar navbar-expand-lg navbar-light">

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
<a href="#" class="nav-link">TRENDING</a>
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
<button class="btn menu-right-btn border active" name="cart" type="submit">
<i class="fa fa-shopping-cart" aria-hidden="true"> Cart</i>
</button></a>
</form>
</div>
</nav>
</header>
	<h1 align="center" style="font-family: Palatino; font-size: 4rem;">Your Cart</h1>
<div align="center" id="mainWrapper">
  <div id="pageContent">
    <div style="margin:24px; text-align:left;">
    <br />
    <table width="100%" cellspacing="0" cellpadding="6" >
      <tr class="row" style="padding-bottom: 20px; height: 40px">

        <td class="col-md-3" bgcolor="#C5DFFA"><strong>Product Image</strong></td>
        <td class="col-md-3" bgcolor="#C5DFFA"><strong>Product Name</strong></td>
        <td class="col-md-2" bgcolor="#C5DFFA"><strong>Unit Price</strong></td>
        <td class="col-md-2" bgcolor="#C5DFFA"><strong>Quantity</strong></td>
        <td class="col-md-1" bgcolor="#C5DFFA"><strong>Total</strong></td>
        <td class="col-md-1" bgcolor="#C5DFFA"><strong>Remove</strong></td>
      </tr>
     <?php echo $cartOutput; ?>
    </table>
    <br>
    <br>
    <div class="totals">
    <div class="totals-item">
      <label style="float: left;
      clear: both;
      width: 93%;
      text-align: right;">Subtotal</label>
      <div class="totals-value" id="cart-subtotal">Rs: <?php echo $cartTotal; ?></div>
    </div>
    <div class="totals-item">
      <label style="float: left;
      clear: both;
      width: 93%;
      text-align: right;">Shipping</label>
      <div class="totals-value" id="cart-shipping">Rs: <?php echo $shipping; ?></div>
    </div>
    <div class="totals-item totals-item-total">
      <label style="float: left;
      clear: both;
      width: 93%;
      text-align: right;">Grand Total</label>
      <div class="totals-value" id="cart-total">Rs: <?php echo $total; ?></div>
    </div>
  </div>
   
    
    
    <br />
<br />
<?php //echo $pp_checkout_btn; ?>
    <br />
    <br />
    <a class="btn btn-outline-info" href="cart.php?cmd=emptycart" style="display: inline;font-size: 0.7em; ">Empty Your Shopping Cart</a>
    <a class="btn btn-outline-info" href="products.php" style="display: inline; font-size: 0.7em;">Continue Shopping</a>
    <div align="right"><a class="btn btn-success btn-large" href="placeorder.php" style="display: inline-block;font-size: 1em;">Checkout</a></div>
    
    </div>
   <br />
  </div>
</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            
                <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
                <p>There was a problem</p>
                <p style="color: #5bc0de"><small>You need to login first!</small></p>
            </div>
            <div class="modal-footer">
                  <a href="loginuser.php" class="btn btn-info">Login Now</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
            </div>
        </div>
    </div>
</div>
</body>
</html>