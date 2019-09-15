<?php
session_start();
$host = "localhost";
        $user = "root";
        $pwd = "Vrudhi6298#";
        $db = "vital care";

        $mysqli = mysqli_connect($host, $user, $pwd, $db); 
if(isset($_POST['button']))
{
	$name=$_POST['name'];
	$address="".$_POST['address1']."<html>&nbsp;</html>".$_POST['address2']."<html>&nbsp;</html>".$_POST['pincode'];
	echo $address;
	$details=$_SESSION['itemquantity'];
	$total=$_SESSION['totalprice'];
	 $sql = "INSERT INTO orderdetails (name,address,details,total)
    VALUES ('$name', '$address','$details', '$total')";
    if (mysqli_query($mysqli, $sql)) {
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
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title></title>
	<style type="text/css">
		  input[type=text], select, textarea,input[type=number]{
  width: 100%; 
  padding: 12px;  
  border: 1px solid #ccc; 
  border-radius: 4px; 
  box-sizing: border-box; 
  margin-top: 6px; 
  margin-bottom: 16px; 
  resize: vertical 
}

input[type=submit] {
  background-color: #8D6ED7;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #BFA5FD;
}


.container {
    padding-top: 10px;
    width: 500px;
    height: auto;
  border-radius: 5px;
  background-color: #f2f2f2;
 
}
body
    {
        background-image: "inventorybg.jpg";
        width: 100%;
    }
    	table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
body.modal-open div.modal-backdrop { 
    z-index: 0; 
}
</style>
</head>
<body>

	</style>
</head>
<body background="inventorybg.jpg">
	<center>
	<h1 style="font-family: Palatino; font-size: 4rem;">Your Bill</h1>
	<table >
		<tr class="row" style="background-color: #ffffff;">
    <th class="col-md-2">Name</th>
    <th class="col-md-4">Description</th>
    <th class="col-md-2">Unit Price</th>
    <th class="col-md-2">Quantity</th>
    <th class="col-md-2">Total Price</th>
  </tr>		
<?php if (isset($_SESSION['bill'])){ echo $_SESSION['bill'];}?>
</table>
</center>
<center>
	
	<h1 style="font-family: Palatino; font-size: 4rem;">Billing Details</h1>


<div class="container">
  <form action="" method="POST" enctype="multipart/form-data">

    <label for="name" style="color: black;">Full Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your Full Name here..." required="required">

    <label for="Address" style="color: black;">Address Line 1</label>
    <input type="text" id="address1" name="address1" placeholder="Building Name, Street name" required="required">


    <label for="Address" style="color: black;">Address Line 2</label>
    <input type="text" id="address2" name="address2" placeholder="Area, City" required="required">

    <label for="pincode" style="color: black;">Pincode</label>
    <input type="number" id="pincode" name="pincode" placeholder="Pin code" required="required">

     <input type="radio" name="pay" value="pay" checked required="required"> <strong>Cash On Delivery</strong><br><br><br>

    <input type="submit" name="button" id="button" value="Place Order">

  </form>
  <br>
  
  <p style="font-size:8px;"> Be 100% sure before placing your order. No return or cancellation will be entertained</p>
</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Your order was placed!</p>
                <p style="color: #5bc0de"><small>Your order will be delivered soon</small></p>
            </div>
            <div class="modal-footer">
                  <a href="loginuser.php" class="btn btn-info">Logout</a>
                  <a href="products.php" class="btn btn-default">Continue Shopping</a>
               
    
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

</body>
</html>