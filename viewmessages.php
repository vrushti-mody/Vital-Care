<?php 
		$host = "localhost";
        $user = "root";
        $pwd = "Vrudhi6298#";
        $db = "vital care";

        $mysqli = mysqli_connect($host, $user, $pwd, $db); 
		
// This block grabs the whole list for viewing
		$product_list = "";
		$sql = "SELECT * FROM contactus";
		$result = mysqli_query($mysqli,$sql);
      	$productCount = mysqli_num_rows($result); // count the output amount
		if ($productCount > 0) {
		while($row = mysqli_fetch_array($result)){ 
             $id = $row["id"];
			 $name = $row["name"];
			 $email = $row["email"];
			 $message=$row["message"];
			 $product_list .= "<tr class='row'  style='color:black;padding-bottom: 20px; height: 40px; '><td class='col-md-2' style='color:black;' > <strong>$name</strong></td><td class='col-md-3'> $email </td><td class='col-md-6'> $message </td><td class='col-md-1' > <a class='btn btn-success' href='reply.php?pid=$id'>Reply</a></td>";
   			}
		} 
		else {
			$product_list = "<tr class=row><td class=col-md-12 style='color:black;'>You have messages yet<td><tr>";
			}


		// Delete Item Question to Admin, and Delete Product if they choose
		


?>
<!DOCTYPE html>
<html>
<head>
<title>Messages</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
<style type="text/css">
	.container
	{
		width: 800px;
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
                <li><a href="editblog.php" style="text-decoration: none;">Edit Blogs</a></li>
            </ul>
        </nav>
    </div>
    </header>
<div align="center" id="mainWrapper" >
  <div id="pageContent"><br />

      <h3>Messages</h3>
      <table class="container" style="
border-spacing:10px;">
      <tr class="row" style="padding-bottom: 20px; height: 40px" bgcolor="#C5DFFA">

        <td class="col-md-2" style="color: black;"><strong>Username</strong></td>
        <td class="col-md-3"style="color: black;" ><strong>Email</strong></td>
        <td class="col-md-7"style="color: black;" ><strong>Message</strong></td>
      </tr>

      <?php echo $product_list; ?>
      </table>
    </div>
  </div>

</body>
</html>