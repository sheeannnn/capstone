<html>
<head>
<script src="dist/sweetalert.min.js"></script> 
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
</html>
<?php
	include_once("dbconnect.php");
	global $connect;

	
if(empty($_POST['firstname']) || empty($_POST['lastname'])|| empty($_POST['username'])|| empty($_POST['password'])|| empty($_POST['password2']) )
{
	 echo "<script>swal({ 
  title: 'Registration Failed',
   text: 'Please Fill All The Fields!',
    type: 'error' 
  },
  function(){
    window.location.href = 'register.php';
});

		</script>";
	die();

		
}

if($_POST['password'] != $_POST['password2'] )
{
	echo "<script>alert('Password Not Match!'); window.location = 'registration.php';</script>";
	die();

		
}

if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['password2']) )

{

       
	$firstname = $_POST["firstname"];	
	$lastname = $_POST["lastname"];
	$username = $_POST["username"];
    $password = $_POST["password"];
 
	$hashed = password_hash($password, PASSWORD_DEFAULT);
        
        
        
       $query = " Insert into users(firstname,lastname,username,password) values ('$firstname','$lastname','$username','$hashed');";
	
	mysqli_query($connect, $query) or die(mysqli_error($connect));
	

	mysqli_close($connect);
echo "<script>swal({ 
  title: 'Registration Successful!',
   text: 'Success!!',
    type: 'success' 
  },
  function(){
    window.location.href = 'index.php';
});

		</script>";
	
	
}


?>	

</html>