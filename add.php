	<?php
	if(empty($_POST["username"]) || empty($_POST["password"]) ||empty($_POST["email"]))
	{
		$nameErr="Fill all fields";
	}
	else
	{
		$username=$_POST["username"];
		$password=$_POST["password"];
		$email=$_POST["email"];
		$host = "localhost";
		$user = "root";
		$pwd = "";
		$db = "login";

		$mysqli = mysqli_connect($host, $user, $pwd, $db);
		if (!$mysqli) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO users (user,email,password)
	VALUES ('$username', '$email', '$password')";
	

	if (mysqli_query($mysqli, $sql)) {
	   
	    header('Location:http://localhost/contact_us.html');
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	}
	mysqli_close($mysqli);
	}
	?>