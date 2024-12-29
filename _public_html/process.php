<?php
include("users/includes/config.php");
error_reporting(0);
if(isset($_POST['submit']))
{
	
	$username=$_POST['username'];
	$password=($_POST['password']);
	
	$status=1;
	$query=mysqli_query($con,"insert into users(username,password,status) values('$username','$password','$status')");
	$msg="Registration successfull. Now You can login !";
	 if ($query) {
     
        
        // Redirect to index.php after successful registration
        header("Location: index.php");
        exit(); // Make sure to exit after redirection
    } else {
        $msg = "Registration failed. Please try again later.";
    }
}

?>
