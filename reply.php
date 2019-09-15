<?php 
	session_start();
    $host = "localhost";
    $user = "root";
    $pwd = "Vrudhi6298#";
    $db = "vital care";

    $mysqli = mysqli_connect($host, $user, $pwd, $db); 

   
// Gather this product's full information for inserting automatically into the edit form below on page
    if (isset($_GET['pid'])) {
    $targetID = $_GET['pid'];
    $sql = "SELECT * FROM contactus WHERE id='$targetID'";
    $result = mysqli_query($mysqli,$sql);
    $productCount = mysqli_num_rows($result); // count the output amount
    if ($productCount > 0) {
      while($row = mysqli_fetch_array($result)){ 
             
       $email = $row["email"];
       $name = $row["name"];
        }
    } else {
      echo "Unknown Error";
    exit();
    }
}
 if(isset($_POST['subject']) && isset($name))
      {
         $to =  $email;
         $subject = $_POST['subject'];
         
         $message = $_POST['message'];
                     
         // $message .= "<h1>This is headline.</h1>";

         $header = "From:vitalcare05@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";

         $retval = mail ($to,$subject,$message,$header);

         if( $retval == true ) {
             echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'><script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#myModal').modal('show');
    });
</script>"; 
         }else {
            echo "Message could not be sent...";
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
  


  <center><h1><strong>Reply</strong></h1></center>
    <br>
 
    <div class="container">
    
  <form action="" method="POST">
    <label for="subject">Subject</label>
    <input type="text" id="subject" name="subject">

    <label for="subject">Reply Message</label>
    <textarea id="message" name="message" style="height:220px;"></textarea>

        <input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
          <input type="submit" name="button" id="button" value="Reply" />
   

  </form>

</div>
<br>
<br>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            
                <h4 class="modal-title">Success</h4>
            </div>
            <div class="modal-body">
                <p>Your message was sent!</p>
                <p style="color: #5bc0de"><small>Keep an eye on your inbox for replies</small></p>
            </div>
            <div class="modal-footer">
                  <a href="adminhome.php" class="btn btn-info">Go to Home Page</a>
                  <a href="viewmessages.php" class="btn btn-default">View More messages</a>
               
    
            </div>
        </div>
    </div>
</div>


   
</body>
</html>