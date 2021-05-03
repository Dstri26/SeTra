<?php 

if($_SERVER["REQUEST_METHOD"]=="POST")
{

	include 'config.php';
	$name=strip_tags($_POST["name"]);
	$password=strip_tags($_POST["password"]);
	$password=md5($password);
	$email=strip_tags($_POST["email"]);

	mysqli_query($con,"insert into test(name,email,password) values('$name','$email','$password')");
	header('location:index.php');
}
	



 ?>