<?php

	session_start();
	if(isset($_SESSION["em"]))
	{
		header("location:profile.php");
	}
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		include 'config.php';
		$email=strip_tags($_POST["email"]);
		$password=strip_tags(md5($_POST["password"]));
		$result=mysqli_query($con,"select * from test where email='$email' and password='$password'");
		if ($arr=mysqli_fetch_assoc($result)) {
			if ($arr["email"]==$email && $arr["password"]==$password) {

				$_SESSION["email"]=$email;
				header("location:http://127.0.0.1:5000/");

			}
			 else {
				echo "Invalid Account";
				
			}
			
		}
		
	}
 ?>