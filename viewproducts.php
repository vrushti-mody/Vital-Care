<?php 
		$host = "localhost";
        $user = "root";
        $pwd = "Vrudhi6298#";
        $db = "vital care";

        $mysqli = mysqli_connect($host, $user, $pwd, $db); 
		
// This block grabs the whole list for viewing
		$product_list = "";
		$sql = "SELECT * FROM products";
		$result = mysqli_query($mysqli,$sql);
      	$productCount = mysqli_num_rows($result); // count the output amount
		if ($productCount > 0) {
		while($row = mysqli_fetch_array($result)){ 
             $id = $row["id"];
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $product_list .= "<tr class='row'  style='padding-bottom: 20px; height: 40px; padding-top: 20px color:black; ' ><td class='col-md-1' style='color:black;'> $id </td><td class='col-md-9' style='color:black;' >$product_name</td> <td class='col-md-1' > <a class='btn btn-primary' href='inventory_edit.php?pid=$id'>Edit</a></td><td class='col-md-1' > <a class='btn btn-danger' href='viewproducts.php?deleteid=$id'>Delete</a></td></tr>";
   			}
		} 
		else {
			$product_list = "<tr class=row><td class=col-md-12 style='color:black;'>You have no products listed in your store yet<td><tr>";
			}


		// Delete Item Question to Admin, and Delete Product if they choose
		if (isset($_GET['deleteid'])) {
			echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="viewproducts.php?yesdelete=' 
			. $_GET['deleteid'] . '">Yes</a> | <a href="viewproducts.php">No</a>';
			exit();
		}
		if (isset($_GET['yesdelete'])) {
			// remove item from system and delete its picture
			// delete from database
			$id_to_delete = $_GET['yesdelete'];
			$sql = "DELETE FROM products WHERE id='$id_to_delete'";
			$result = mysqli_query($mysqli,$sql);
			// unlink the image from server
			// Remove The Pic -------------------------------------------
    		$pictodelete = ("inventory_images/$id_to_delete.jpg");
    		if (file_exists($pictodelete)) {
       		    	unlink($pictodelete);
    		}
	header("location: viewproducts.php"); 
    exit();
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Inventory List</title>
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
    <div align="right" style="margin-right:32px;"><a href="addproduct.php" class="btn btn-info" >+ Add New Inventory Item</a></div>

      <h3>Inventory list</h3>
      <table class="container" >
		<tr class="row" style="padding-bottom: 20px; height: 40px; padding-top: 20px color:black;" bgcolor="#C5DFFA">

        <td class="col-md-1" style='color:black;' ><strong>Id</strong></td>
        <td class="col-md-9" style='color:black;'><strong>Product Name</strong></td>
        <td class="col-md-1" style='color:black;'><strong>Changes</strong></td>
         <td class="col-md-1" style='color:black;'><strong>Delete</strong></td>
    </tr>
      <?php echo $product_list; ?>
      </table>
    </div>
  </div>

</body>
</html>