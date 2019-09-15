<?php 

    $host = "localhost";
    $user = "root";
    $pwd = "Vrudhi6298#";
    $db = "vital care";

    $mysqli = mysqli_connect($host, $user, $pwd, $db); 

    // Parse the form data and add inventory item to the system
    if (isset($_POST['product_name'])) {
	
	   $pid =$_POST['thisID'];
     $product_name = $_POST['product_name'];
	   $price = $_POST['price'];
	   $category = $_POST['category'];
	   $details = $_POST['details'];

	// See if that product name is an identical match to another product in the system
	   $sql = "UPDATE products SET product_name='$product_name', price='$price', details='$details', category='$category' 
             WHERE id='$pid'";
     $result = mysqli_query($mysqli,$sql);
     if(isset($_POST['fileField']))
     {
	   if ($_FILES['fileField']['tmp_name'] != "") {
	    // Place image in the folder 
	    $newname = "$pid.jpg";
	    move_uploaded_file($_FILES['fileField']['tmp_name'], "inventory_images/$newname");
	   }
   }
	  echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'><script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#myModal').modal('show');
    });
</script>"; 
      
}

// Gather this product's full information for inserting automatically into the edit form below on page
    if (isset($_GET['pid'])) {
    $targetID = $_GET['pid'];
    $sql = "SELECT * FROM products WHERE id='$targetID'";
    $result = mysqli_query($mysqli,$sql);
    $productCount = mysqli_num_rows($result); // count the output amount
    if ($productCount > 0) {
      while($row = mysqli_fetch_array($result)){ 
             
       $product_name = $row["product_name"];
       $price = $row["price"];
       $category = $row["category"];
       $details = $row["details"];
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
<title>Edit Inventory Item Form</title>
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
    <div class="container">
    
  <form action="" method="POST" enctype="multipart/form-data">
    <label for="product_name">Product Name</label>
    <input type="text" id="product_name" name="product_name" value="<?php echo $product_name; ?>">

    <label for="price">Price(in Rs)</label>
    <input type="number" id="price" name="price" value="<?php echo $price; ?>">

    <label for="category">Category</label>
    <select name="category" id="category">
          <option value="HEALTH & FITNESS">Health and Fitness</option>
          <option value="PERSONAL CARE">Personal Care</option>
          <option value="HOMEOPATHY">Homeopathy</option>
          <option value="AYURVEDA">Ayurveda</option>
          <option value="DIABETES">Diabetes</option>
          </select>

    <label for="details">Description</label>
    <textarea id="details" name="details"style="height:200px"><?php echo $details; ?></textarea>

    <label for="image">Product Image</label>
    <input type="file" name="fileField" id="fileField"> 
    <br>
    <input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
          <input type="submit" name="button" id="button" value="Make Changes" />
   

  </form>

</div>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            
                <h4 class="modal-title">Success</h4>
            </div>
            <div class="modal-body">
                <p style="font-size: 15px;">Details were updated</p>
                <p style="color: #5bc0de; font-size: 12px;"><small>These will reflect on the product page.</small></p>
            </div>
            <div class="modal-footer">
                  <a href="adminhome.php" class="btn btn-info">Go to Home Page</a>
                  <a href="" class="btn btn-default">Close</a>
               
    
            </div>
        </div>
    </div>
</div>



   
</body>
</html>