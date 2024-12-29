<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=($_POST['password']);
	$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
	$num=mysqli_fetch_array($ret);
	if($num>0)
	{
		$extra="dashboard.php";//
		$_SESSION['alogin']=$_POST['username'];
		$_SESSION['id']=$num['id'];
		$host=$_SERVER['HTTP_HOST'];
		$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
		header("location:http://$host$uri/$extra");
		exit();
	} 
	
	
		elseif($num==0)
		{
			$ret1=mysqli_query($con,"SELECT * FROM tblsubadmin WHERE UserName='$username' and Password='$password'");
			$num1=mysqli_fetch_array($ret1);
			if($num1>0)
			{
				$acctstatus=$num1['IsActive'];
				if($acctstatus=='1')
				{
					$extra="sub/dashboard.php";//
					$_SESSION['subalogin']=$_POST['username'];
					$_SESSION['suid']=$num1['id'];
					$host=$_SERVER['HTTP_HOST'];
					$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
					header("location:http://$host$uri/$extra");
					exit();
				}
				else
				{
					$_SESSION['errmsg']="Your account is blocked. Please contact administrator.";	
				}
			}
			elseif($num1==0)
			{
				$ret2=mysqli_query($con,"SELECT * FROM Principal WHERE username='$username' and password='$password'");
				$num2=mysqli_fetch_array($ret2);
				if($num2>0)
				{
				$extra="../principle/dashboard.php";//
				$_SESSION['alogin']=$_POST['username'];
				$_SESSION['id']=$num['id'];
				$host=$_SERVER['HTTP_HOST'];
				$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
				header("location:http://$host$uri/$extra");
				exit();
				}
			}
			else
			{
				$_SESSION['errmsg']="Invalid username or password";
			}
		}
		
	
	
}
?>


<!DOCTYPE html>
<!-- Coding by CodingLab || www.codinglabweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Website with Login & Registration Form</title>
    <link rel="stylesheet" href="style1.css" />
    	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <nav class="nav">
          <div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						<a href="../index.php" style="color:#000;">
						<i class="fa-solid fa-arrow-left fa-lg"></i> Back to Portal
						
						</a>

						

						
					</ul>
				</div><!-- /.nav-collapse -->
                 <a class="navbar-brand-logo" href="">
 <img width="0px" height="auto" src=""></a>
				
      
        <button class="button" style="font-weight: bold;font-size: 21px;" id="form-open">Login</button>
      </nav>
    </header>

    <!-- Home -->
    <section class="home show">
      <div class="form_container">
        <i class="uil uil-times form_close"></i>
        <!-- Login From -->
        <div class="form login_form">
            <input type="checkbox" id="forget">
         <form class="form-vertical" method="post">
            <h2>Login</h2>

            <div class="input_box">
              <input class="span12" type="text" id="inputEmail" name="username" placeholder="Username" required>
              <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
              <input class="span12" type="password" id="inputPassword" name="password" placeholder="Password" required>
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>

            <div class="option_field">
              <span class="checkbox">
                <input type="checkbox" id="check" />
                <label for="check">Remember me</label>
              </span>
              <div class="text"><label for="forget">Forgot password?</label></div>
            </div>

             <button type="submit" class="btn button btn-primary pull-right" name="submit">Login</button>

            
          </form>
                      <?php session_start(); ?>
                   <form class="form-forgot-password" id="form-forgot-password"  method="POST" name="recover_psw">
                            <div class="input_box">
                                              <input class="span12" type="email" id="inputEmail" name="adminmail" placeholder="Mail Id" required>
              <i class="uil uil-envelope-alt email"></i>
                            </div>
                           
                            <input type="submit" class="btn button btn-primary pull-right" name="recover" value="Recover">
        </div>

        <!-- Signup From -->
        
      </div>
    </section>
  <?php
include("include/recover_psw.php");?> 
    <script src="script1.js"></script>
<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
