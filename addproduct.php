

<?php
$host = "localhost";
        $user = "root";
        $pwd = "Vrudhi6298#";
        $db = "vital care";

        $mysqli = mysqli_connect($host, $user, $pwd, $db); 

if (isset($_POST['product_name'])) {
    
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $details =$_POST['details'];
    // See if that product name is an identical match to another product in the system
    $sql = "SELECT id FROM products WHERE product_name='$product_name'";
    $result = mysqli_query($mysqli,$sql);
    $productMatch = mysqli_num_rows($result);
    if ($productMatch > 0) {
        echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="inventory_list.php">click here</a>';
        exit();
    }

    //Inserting Into Database
    $sql = "INSERT INTO products (product_name,price,details,category)
    VALUES ('$product_name', '$price','$details', '$category')";
  
  // If query is successful  
  if (mysqli_query($mysqli, $sql)) {
    $info = new SplFileInfo($_FILES['filefield']['tmp_name']);
      $name = $product_name.".jpg";
    $temp_name  = $_FILES['filefield']['tmp_name'];  
    if(isset($name)){
        if(!empty($name)){        
            $target="inventory_images/";   
            if(move_uploaded_file($temp_name, $target.$name)){
                echo 'File uploaded successfully';
            }
        }       
    }  else {
        echo 'You should select a file to upload !!';
    }
  //setting a name for the new image
//creating path
  
      
  }
  




    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Add New Inventory Item Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
 <link rel="stylesheet" type="text/css" href="nav.css">

    <title>Add Product</title>
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
    padding-top: 100px;
    width: 500px;
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
   <header style="background-color: white;">
        <div class="wrapper">
        <h1><a href="adminhome.php" style="text-decoration: none;" >Vital Care</a><span class="color">.</span></h1>
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
    <center><h3>Add Product</h3></center>

    <div class="container">
  <form action="" method="POST" enctype="multipart/form-data">

    <label for="product_name" style="color: black;">Product Name</label>
    <input type="text" id="product_name" name="product_name" placeholder="Enter Product Name here...">

    <label for="price" style="color: black;">Price(in Rs)</label>
    <input type="number" id="price" name="price" placeholder="Enter the price of the product here...">

    <label for="category" style="color: black;">Category</label>
    <select name="category" id="category">
          <option value="HEALTH & FITNESS">Health & Fitness</option>
          <option value="PERSONAL CARE">Personal Care</option>
          <option value="HOMEOPATHY">Homeopathy</option>
          <option value="AYURVEDA">Ayurveda</option>
          <option value="DIABETES">Diabetes</option>
          </select>

    <label for="details" style="color: black;">Description</label>
    <textarea id="details" name="details" placeholder="Write something about your product..." style="height:200px"></textarea>

    <label for="image" style="color: black;">Product Image</label>
    <input type="file" name="filefield" id="file2">  <!-- Option to select file -->
    <br>

    <input type="submit" name="button" id="button" value="Add Item">

  </form>
</div>

    
</body>
</html>