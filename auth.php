<html>
<head>
<script src="dist/sweetalert.min.js"></script> 
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
</html>

<?php
include_once('dbconnect.php');

global $connect;
$username="";
$password="";
$type="";
if(empty($_POST['username']) || empty($_POST['password']))
{
 echo "<script>swal({ 
  title: 'Incorrect Username or Password',
   text: 'Login Failed!',
    type: 'error' 
  },
  function(){
    window.location.href = 'index.php';
});

    </script>";
  die();
}
else
  
  date_default_timezone_set('Asia/Singapore');
  $lastlogin = date('m/d/Y h:i:s a', time());

$username= $_POST['username'];
$password= $_POST['password'];



  $query = "SELECT * FROM users WHERE username='$username'";
      $result = mysqli_query($connect, $query);
      if(mysqli_num_rows($result)>0)
                        {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        if(password_verify($password, $row['password']))
                        {
              session_start();
                          $_SESSION['username'] = $username;
                            header("location:controller.php?home");
               mysqli_close($connect);
                  
            }
                 echo "<script>swal({ 
  title: 'Incorrect Username or Password',
   text: 'Login Failed!',
    type: 'error' 
  },
  function(){
    window.location.href = 'index.php';
});

    </script>";
               die();
           
                        }
        
  
            else
            {
  
  
     echo "<script>swal({ 
  title: 'Incorrect Username or Password',
   text: 'Login Failed!',
    type: 'error' 
  },
  function(){
    window.location.href = 'index.php';
});

    </script>";
            }
  
  
  




?>