<?php

	session_start();
	if(isset($_SESSION["name"]))
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

				$_SESSION["name"]=$arr["name"];
				$_SESSION["id"]=$arr["id"];
				header("location:profile.php");

			}
			 else {
				echo "Invalid Account";
				
			}
			
		}
		
	}
 ?>