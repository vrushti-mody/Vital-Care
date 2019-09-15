<?php 

    $host = "localhost";
    $user = "root";
    $pwd = "Vrudhi6298#";
    $db = "vital care";

    $mysqli = mysqli_connect($host, $user, $pwd, $db); 

    // Parse the form data and add inventory item to the system
    if (isset($_POST['button'])) {
	
	   $pid =$_POST['thisID'];
     $title = $_POST['title'];
	   $author = $_POST['author'];
	   $content = $_POST['content'];

	// See if that product name is an identical match to another product in the system
	   $sql = "UPDATE products SET title='$title', author='$author', content='$content' WHERE id='$pid'";
     $result = mysqli_query($mysqli,$sql);
	   if ($_FILES['fileField']['tmp_name'] != "") {
	    // Place image in the folder 
	    $newname = "$pid.jpg";
	    move_uploaded_file($_FILES['fileField']['tmp_name'], "blog_images/$newname");
	   }
	   header("location:editblog.php"); 
      exit();
}

// Gather this product's full information for inserting automatically into the edit form below on page
    if (isset($_GET['pid'])) {
    $targetID = $_GET['pid'];
    $sql = "SELECT * FROM blog WHERE id='$targetID'";
    $result = mysqli_query($mysqli,$sql);
    $productCount = mysqli_num_rows($result); // count the output amount
    if ($productCount > 0) {
      while($row = mysqli_fetch_array($result)){ 
             
       $title = $row["title"];
       $author = $row["author"];
       $content = $row["content"];
        }
    } else {
      echo "Unknown Error";
    exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="admin.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Edit Blog Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <title>Add Product</title>
    <style type="text/css">
  input[type=text], select, textarea,input[type=number]{
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */  
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #8D6ED7;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #BFA5FD;
}

/* Add a background color and some padding around the form */
.container {
    padding-top: 100px;
    width: 600px;
    height: auto;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
body
    {
        background-image: "inventorybg.jpg";
        width: 100%;
    }

</style>
</head>
<body background="inventorybg.jpg">
  
<div align="center" id="mainWrapper">
  <div id="pageContent"><br />
    <div align="right" style="margin-right:32px;"><a href="addproduct.php" class="btn btn-info">+ Add New Inventory Item</a></div>
    <h3>

  <center><h1><strong>Update Details</strong></h1></center>
    <br>
    <br>
    <div class="container" >
  <form action="" method="POST">

    <label for="title" style="color: black;">Blog Title</label>
    <textarea id="title" name="title" placeholder="Enter the blog title here..."  required="required" ><?php echo $title; ?></textarea>

    <label for="author" style="color: black;">Written by</label>
    <input type="text" id="author" name="author" placeholder="Enter the name of the author here..." required="required" value="<?php echo $author; ?>">


    <label for="content" style="color: black;">Blog body</label>
    <textarea id="content" name="content" style="height:750px;" placeholder="Write the blog here..."  ><?php echo $content; ?> </textarea>
    <label for="image" style="color: black;">Add an Image</label>
    <input type="file" name="fileField" id="fileField">  <!-- Option to select file -->
    <br>

    <br>

    <input type="submit" name="button" id="button" value="Update Blog">

  </form>
</div>
<br>
<br>




   
</body>
</html>