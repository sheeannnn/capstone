<?php
	include_once("../connection/dbconnection.php");
	
	if (isset($_POST['firstname']) && 
		isset($_POST['lastname'])  && 
		isset($_POST['username']) && 
		isset($_POST['email']) && 
		isset($_POST['password']))
	
	{
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$emailadd = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		mysqli_query($connection,"insert into users(firstname,lastname,username,email,password) 
			values('". $fname ."','". $lname ."','" . $username ."','" . $emailadd . "','" . $password . "'
					)");

	echo ("<script language='javascript'>
		window.alert('Successfully registered. Please login to continue!')
		window.location='../index.php';
		</script>");


	}
	// header('location:../index.php');
?>	