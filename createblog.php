<?php
$host = "localhost";
        $user = "root";
        $pwd = "Vrudhi6298#";
        $db = "vital care";

        $mysqli = mysqli_connect($host, $user, $pwd, $db); 

if (isset($_POST['button'])) {
    
    $title = $_POST['title'];
    $author = $_POST['author'];
   
    $content =$_POST['content'];
    // See if that product name is an identical match to another product in the system
    $sql = "SELECT id FROM blog WHERE title='$title'";
    $result = mysqli_query($mysqli,$sql);
    $productMatch = mysqli_num_rows($result);
    if ($productMatch > 0) {
        echo 'Sorry you tried to place a duplicate "Blog Title" into the system, <a class="btn btn-info" href="createblog.php">click here</a>';
        exit();
    }

    //Inserting Into Database
    $sql = "INSERT INTO blog (title,author,content)
    VALUES ('$title', '$author','$content')";
   

 
  // If query is successful  
  if (mysqli_query($mysqli, $sql)) {
    $id = mysqli_insert_id($mysqli);

   $newname = $id.".jpg";
  //setting a name for the new image
  $target="blog_images/"; //selecting the folder
  $target = $target . $newname; //creating path
  if (move_uploaded_file( $_FILES['fileField']['tmp_name'], $target)) //transfering
  {
    echo "The file has been uploaded as ".$newname;
  }

    
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
<title>Write A Blog</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
 <link rel="stylesheet" type="text/css" href="admin.css">

    <title>Add Blog</title>
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
    width: 900px;
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
        <h1><a href="adminhome.php" style="text-decoration: none;">Vital Care</a><span class="color">.</span></h1>
        <nav>
            <ul>
               <li><a href="addproduct.php"  style="text-decoration: none;">Add Product</a></li>
                <li><a href="viewproducts.php"  style="text-decoration: none;">View Products</a></li>
                <li><a href="viewmessages.php" style="text-decoration: none;">View Messages</a></li>
                 <li><a href="createblog.php"  style="text-decoration: none;">Add Blog</a></li>
                <li><a href="editblog.php"  style="text-decoration: none;">Edit Blogs</a></li>
            </ul>
        </nav>
    </div>
    </header>
    <center><h3>Write A Blog</h3></center>

    <div class="container" >
  <form action="" method="POST" enctype="multipart/form-data">

    <label for="title" style="color: black;">Blog Title</label>
    <textarea id="title" name="title" placeholder="Enter the blog title here..."  required="required"></textarea>

    <label for="author" style="color: black;">Written by</label>
    <input type="text" id="author" name="author" placeholder="Enter the name of the author here..." required="required">


    <label for="content" style="color: black;">Blog body</label>
    <textarea id="content" name="content" style="height:750px;" placeholder="Write the blog here..."  required="required"> </textarea>
    <label for="image" style="color: black;">Add an Image</label>
    <input type="file" name="fileField" id="fileField">  <!-- Option to select file -->
    <br>

    <br>

    <input type="submit" name="button" id="button" value="Publish Blog">

  </form>
</div>
<br>
<br>
    
</body>
</html>