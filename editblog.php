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
			 $product_list .= "<tr class='row' style='padding-bottom: 20px; height: 40px; padding-top: 20px color:black;'><td class='col-md-7' style='color:black;'>".$title." </td><td class='col-md-3' style='color:black;' >".$author."</td> <td class='col-md-1' style='color:black;'> <a class='btn btn-primary btn-block' href='blog_edit.php?pid=$id'>Edit</a></td><td class='col-md-1' > <a class='btn btn-danger' href='editblog.php?deleteid=$id'>Delete</a></td></tr>";
   			}
		} 
		else {
			$product_list = "<tr class=row><td class=col-md-12 style='color:white;'>You have no blogs yet<td><tr>";
			}

if (isset($_GET['deleteid'])) {
			echo 'Do you really want to delete the blog with ID  ' . $_GET['deleteid'] . '? <a href="editblog.php?yesdelete=' 
			. $_GET['deleteid'] . '">Yes</a> | <a href="editblog.php">No</a>';
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
    		$pictodelete = ("blog_images/$id_to_delete.jpg");
    		if (file_exists($pictodelete)) {
       		    	unlink($pictodelete);
    		}
	header("location: editblog.php"); 
    exit();
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
                <li><a href="addproduct.php">Add Product</a></li>
                <li><a href="viewproducts.php">View Products</a></li>
                <li><a href="viewmessages.php">View Messages</a></li>
                 <li><a href="createblog.php">Add Blog</a></li>
                <li><a href="editblog.php">Edit Blogs</a></li>
            </ul>
        </nav>
    </div>
    </header>
<div align="center" id="mainWrapper" >
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="createblog.php" class="btn btn-info" >+ Write A New Blog</a></div>

      <h3>Blog list</h3>
      <table class="container" >
		 <tr class="row" style="padding-bottom: 20px; height: 40px; padding-top: 20px color:black;" bgcolor="#C5DFFA">

        <td class="col-md-7" style='color:black;' ><strong>Title</strong></td>
        <td class="col-md-3" style='color:black;'><strong>Author</strong></td>
        <td class="col-md-1" style='color:black;'><strong>Changes</strong></td>
         <td class="col-md-1" style='color:black;'><strong>Delete</strong></td>
    </tr>
      <?php echo $product_list; ?>
      </table>
    </div>
  </div>

</body>
</html>