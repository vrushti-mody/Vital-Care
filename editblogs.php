<?php 
		$host = "localhost";
        $user = "root";
        $pwd = "Vrudhi6298#";
        $db = "vital care";

        $mysqli = mysqli_connect($host, $user, $pwd, $db); 
		
// This block grabs the whole list for viewing
		$product_list = "";
		$sql = "SELECT * FROM blog";
		$result = mysqli_query($mysqli,$sql);
      	$productCount = mysqli_num_rows($result); // count the output amount
		if ($productCount > 0) {
		while($row = mysqli_fetch_array($result)){ 
             $id = $row["id"];
			 $title = $row["title"];
			 $author = $row["author"];
			 $product_list .= "<tr class='row'  style='color:black;'><td class='col-md-6'>".$title." </td><td class='col-md-3' style='color:black;' > <strong>".$author."</strong></td> <td class='col-md-3' > <a class='btn btn-primary' href='blog_edit.php?pid=$id'>Edit</a></td></tr>";
   			}
		} 
		else {
			$product_list = "<tr class=row><td class=col-md-12 style='color:white;'>You have no blogs yet<td><tr>";
			}


?>
<!DOCTYPE html>
<html>
<head>
<title>Blog List</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="admin.css">
<style type="text/css">
	.container
	{
		width: 600px;
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

      
      <table class="container" style="border-collapse:separate; 
border-spacing:1em;">
<h3>Blog list</h3>
      <?php echo $product_list; ?>
      </table>
    </div>
  </div>

</body>
</html>