
<?php 
session_start(); 
$host = "localhost";
        $user = "root";
        $pwd = "Vrudhi6298#";
        $db = "vital care";

        $mysqli = mysqli_connect($host, $user, $pwd, $db); 
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) {
	// Connect to the MySQL database  
    

	$id =  $_GET['id']; 
	$sql = "SELECT * FROM products WHERE id='$id' LIMIT 1";
  $result = mysqli_query($mysqli,$sql);
	$productCount = mysqli_num_rows($result); // count the output amount
    if ($productCount > 0) {
		// get all the product details
		while($row = mysqli_fetch_array($result)){ 
			 $product_name = $row["product_name"];
			 $price = $row["price"];
			 $details = $row["details"];
			 $category = $row["category"];
         }
        
		 
	} else {
		echo "That item does not exist.";
	    exit();
	}
  $reviews="";
  $sql1 = "SELECT * FROM rating WHERE pid='$id'";
  $result1 = mysqli_query($mysqli,$sql1);
  $productCount1 = mysqli_num_rows($result1); // count the output amount
    if ($productCount1 > 0) {
    // get all the product details
      $avgrating="";
      $i=0;
    while($row = mysqli_fetch_array($result1)){ 

       $username = $row["username"];
       $rating = $row["rating"];
       $review = $row["review"];
       $reviews.="<div class='row' width='100%' style='padding-top:20px; padding-bottom:20px; padding-left:20px; padding-right:20px; '><div class ='col-md-12' style='border-style:solid; border-width: thin; border-color: grey; border-radius:20px;'><p style='font-size:20px; padding-left:10px; font-family:Times New Roman; '>".$username."</p ><p style='font-size:23px; font-family:Georgia; padding-left:10px;'>".$review."</p><footer style='font-size:16px; padding-left:10px;'>Rated:<i>".$rating."</i> stars</div></div>";
       (float)$avgrating=(float)$avgrating+(float)$rating;
       $i=$i+1;
         }
         $avgrating=(float)$avgrating/$i;
         
       }
       else
       {
        $reviews="<div class='row'><div class='col-md-12'><span style='font-family: Palatino; font-size: 2rem; padding-left: -20px'>No Reviews Yet!</span><div><div>";
        $avgrating="N/A";
       }
}

else {
	echo "Data to render this page is missing.";
	exit();
  }
  if (isset($_POST['button'])) {
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['username'])) {
              $username=$_SESSION['username'];
              $rating=$_POST['rating'];
              $review=$_POST['review'];
         

          $sql = "INSERT INTO rating (pid,username,rating,review) VALUES ('$id','$username', '$rating','$review')";
          if (mysqli_query($mysqli, $sql)) {

      
  }
   else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
      }
      else
      {
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<title><?php echo $product_name; ?></title>
 <style type="text/css">
    /* Basic Styling */
html, body {
  width: 100%;
  
  font-family: 'Roboto', sans-serif;
}
 
.container {
 
  background-color: #f2f2f2;
}
/* Columns */
.left-column {
  width: 35%;
  position: relative;
  margin-left: 20px;
  margin-right: 20px;
  margin-top: 20px;
}
 
.right-column {
  width: 65%;
  margin-top: 20px;
}
/* Left Column */
.left-column img {
  width: 100%;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  transition: all 0.3s ease;
}
 
.left-column img.active {
  opacity: 1;
}
/* Product Description */
.product-description {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}
.product-description span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}
.product-description h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}
.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}
/* Product Price */
.product-price {
  display: flex;
  align-items: center;

  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}
 
.cart-btn {
  
  background-color: #8D6ED7;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  
}
.cart-btn:hover {
  background-color: #BFA5FD;
}
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
body.modal-open div.modal-backdrop { 
    z-index: 0; 
}
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 


  </style>
</head>
<body background="productbg2.jpg">
<section>
<div class="container" style=" margin-top: 66px;
  max-width: 1200px;
  
  padding: 25px;
  display: flex;">
  <div class="left-column">
    <img class="active" src="inventory_images/<?php echo $product_name; ?>.jpg" alt="<?php echo $product_name; ?>" style="height: 373px;
  width: 80%;">
  </div>
 
  <div class="right-column">
    <div class="product-description">
      <span> <?php echo " $category"; ?></span>
      <h1><?php echo "$product_name"; ?></h1>
      <p><?php echo "$details"; ?></p>
    </div>
 
    <div class="product-price">
      <span>Price: &nbsp; </span>
      <span><?php echo "Rs ".$price; ?></span>
      <br>
    </div>
    <br>
    <br>
     <span style="font-family: Palatino; font-size: 2rem; padding-left: -20px">Average Rating:<?php echo $avgrating; ?></span>
     <br>
    <br>
    <br>
    <form action="cart.php" method="POST" id="form1" name="form1" >
      <input type="hidden" id="hide" name="hide" value="3487">
       <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
      <button type="submit" class="btn btn-info">Add to cart</button>
    </form>
    <br>
    <br>
    <br>
  </div>
</section>
<h1 style="font-family: Palatino; font-size: 3rem; padding-left: 50px;">Product Reviews</h1>
  <section>
    <div class="container" style=" margin-top: 20px; margin-bottom:20px">
      
      <?php echo "$reviews"; ?>
   
    </div>

  </section>

<h1 style="font-family: Palatino; font-size: 3rem; padding-left: 50px;">Write Your review here</h1>
  <section>
     <div class="container">
      <br>

      <p style='font-size:15px; font-family:Georgia; padding-right:10px;'>Rating</p>
  <form action="" method="POST">
   
   <fieldset class="rating">
       <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5"></label>
    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" ></label>
    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" ></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3"></label>
    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" ></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" ></label>
    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half"> </label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1"></label>
    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" ></label>
   
</fieldset>
    <br>
    <br>
    <p style='font-size:15px; font-family:Georgia; padding-left:10px;'>Review</p>
    <textarea id="details" name="review" placeholder="Write something the your product..." style="height:200px" required="required"></textarea>


    <input type="submit" name="button" id="button" value="Post Review">

  </form>
 
  <br>
</div>

  </section>
  <section>
    
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            
                <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
                <p>There was a problem</p>
                <p style="color: #5bc0de"><small>You need to login first!</small></p>
            </div>
            <div class="modal-footer">
                  <a href="loginuser.php" class="btn btn-info">Login Now</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
            </div>
        </div>
    </div>
</div>
  </section>

</body>
</html>