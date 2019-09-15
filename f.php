<?php

if(isset($_POST['button']))
{
  if(isset($_POST['FirstName'])&& isset($_POST['LastName']) && isset($_POST['Email']))
  {
    echo "Welcome".$_POST['FirstName']." ".$_POST['LastName'];
    echo "Email:".$_POST['Email'];
    echo "Answer:".$_POST['q1'];
    
  }
}

?>

<!DOCTYPE html>
<html>
<body style="background-color: #AEFDFF">
<center><h1 style="background-color: #FFFFFF">The Marvel Quiz</h1></center>
<h2>Registration Form:</h2>
<form action="" method="POST" >
First name: <br><input type="text" name="FirstName" ><br>
<br>
Last name:<br> <input type="text" name="LastName" ><br>
<br>
Email id: <br><input type="text" name="Email" ><br>
<h3>Answer the following question correctly!</h3>
<p>Which MCU movie first featured Spiderman?</p>
<input type="radio" name="q1" value="Spiderman: Homecoming" > Spiderman: Homecoming<br>
  <input type="radio" name="q1" value="Iron Man 3"> Iron Man 3<br>
  <input type="radio" name="q1" value="Captain America: Civil War">Captain America: Civil War<br>
  <br>
  

<input type="submit" value="Submit" name="button">
</form>
</body>
</html>
