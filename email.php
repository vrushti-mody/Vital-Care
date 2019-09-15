
  
      <?php
      session_start();
      if(isset($_SESSION['email1']) && isset($_SESSION['username2']))
      {
         $to =  $_SESSION['email1'];
         $subject = "Welcome to Vital Care";
         echo $to;

         $message = "Dear &nbsp;".$_SESSION['username2'].",<br><br>

                     <i>Thank you for registering at Vital Care!</i><br><br>
                     In a world marred by 'Tyranny of choice', unsustainable discounts, similar looking mass produced products, and mechanical shopping, Vital Care is like a breath of fresh air. We bring the joy, emotions, and serendipity back in your shopping.<br>
                     <br>
                     Adapting to the perpetually changing technological and dimensional needs of the customers, Vital Care is meant to benefit different segments of the Indian society, benefiting them with the advantages of the e-Commerce retailing <br>
                     <br>
                      Vital Care is a curated marketplace that exhibits and sells natural & sustainable products from passionate sellers across the country. We are your partners in your journey to a cleaner, safer, healthier, and sustainable living. We deliver everything to your doorstep at honest prices.</p><br><br>

                     Thank you again for your registration.<br>
                     Happy Shopping!<br>
                     <br>
                     Regards,<br>
                     Team Vital Care<br>
                     vitalcare05@gmail.com";
                     
         // $message .= "<h1>This is headline.</h1>";

         $header = "From:vitalcare05@gmail.com \r\n";
         $header .= "Cc:vidhimody98@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";

         $retval = mail ($to,$subject,$message,$header);

         if( $retval == true ) {
             header('Location:loginuser.php');
         }else {
            echo "Message could not be sent...";
         }
         }
      ?>

  