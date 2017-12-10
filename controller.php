<?php
include_once('dbconnect.php');

if(isset($_GET['home'])){
		header("location:admin.php");
		
	}
	else{
if(isset($_GET['logout'])){
session_destroy();
header("location:index.php");

}
	
	
	

}

?>