<?php 
		$host = "localhost";
        $user = "root";
        $pwd = "Vrudhi6298#";
        $db = "vital care";

        $mysqli = mysqli_connect($host, $user, $pwd, $db); 
		
// This block grabs the whole list for viewing
		$product_list = "";
		$sql = "SELECT * FROM orderdetails";
		$result = mysqli_query($mysqli,$sql);
      	$productCount = mysqli_num_rows($result); // count the output amount
		if ($productCount > 0) {
		while($row = mysqli_fetch_array($result)){ 
             $name = $row["name"];
			 $address = $row["address"];
			 $details=$row["details"];
			 $total = $row["total"];
			 $product_list .= "<tr class='row'  style='padding-bottom: 20px; height: 40px; padding-top: 20px color:black; ' ><td class='col-md-1' style='color:black;'> $name </td><td class='col-md-7' style='color:black;' >$address</td> <td class='col-md-3' style='color:black;' >$details</td><td class='col-md-1' >$total</td></tr>";
   			}
		} 
		else {
			$product_list = "<tr class=row><td class=col-md-12 style='color:black;'>You have no orders yet<td><tr>";
			}


		// Delete Item Question to Admin, and Delete Product if they choose
		


?>
<!DOCTYPE html>
<html>
<head>
<title>View Orders</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
<style type="text/css">
	.container
	{
		width: 900px;
		background: #f2f2f2;

	}
	tr
	{
		padding-top: 10px;
		padding-bottom: 10px;
	}
	body
	{
		background-image: "inventorybg.jpg";
		width: 100%;
	}
</style>
</head>
<body background="inventorybg.jpg">
	<header style="background-color:white;">
        <div class="wrapper">
        <h1><a href="adminhome.php" style="text-decoration: none;">Vital Care</a><span class="color">.</span></h1>
        <nav>
            <ul>
                <li><a href="addproduct.php"  style="text-decoration: none;">Add Product</a></li>
                <li><a href="viewproducts.php"  style="text-decoration: none;">View Products</a></li>
                <li><a href="viewmessages.php"  style="text-decoration: none;">View Messages</a></li>
                 <li><a href="createblog.php"  style="text-decoration: none;">Add Blog</a></li>
                <li><a href="editblog.php"  style="text-decoration: none;">Edit Blogs</a></li>
            </ul>
        </nav>
    </div>
    </header>
	    
<div align="center" id="mainWrapper" >
  <div id="pageContent"><br />

      <h3>Your Orders</h3>
      <table class="container" >
		<tr class="row" style="padding-bottom: 20px; height: 40px; padding-top: 20px color:black;" bgcolor="#C5DFFA">

        <td class="col-md-1" style='color:black;' ><strong>Name</strong></td>
        <td class="col-md-7" style='color:black;'><strong>Address</strong></td>
        <td class="col-md-3" style='color:black;'><strong>Items Ordered</strong></td>
         <td class="col-md-1" style='color:black;'><strong>Total Price</strong></td>
    </tr>
      <?php echo $product_list; ?>
      </table>
    </div>
  </div>

</body>
</html>