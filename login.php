<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		include 'config.php';
		$email=strip_tags($_POST["email"]);
		$password=strip_tags(md5($_POST["password"]));
		$result=mysqli_query($con,"select * from test where email='$email' and password='$password'");
		print_r($result);
		if ($arr=mysqli_fetch_assoc($result)) {
			echo $arr["email"]; 
			if ($arr["email"]==$email && $arr["password"]==$password) {

				$_SESSION["name"]=$arr["name"];
				$_SESSION["email"]=$arr["email"];
				$_SESSION["id"]=$arr["id"];
				header("location:profile.php");

			}
			 else {
				echo "Invalid Account";
				header("location:index.php?msg=Email and Password doesn't match");
				
			}
		}
		else {
			echo "Invalid Account";
			header("location:index.php?msg=Email and Password doesn't match");
			
		}
		
	}
 ?>