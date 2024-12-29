
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$state=$_POST['state'];
	$description=$_POST['description'];
$sql=mysqli_query($con,"insert into state(stateName,stateDescription) values('$state','$description')");
$_SESSION['msg']="State added Successfully !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from state where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="State deleted !!";
		  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| State</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="css/child-style.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>
<form method="post" action="import.php" enctype="multipart/form-data">
    
	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Add Students/Staff Data</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="Category" method="post" >
									
<div class="control-group">
<label class="control-label" for="basicinput">Add Data</label>
<div class="controls">
<input type="file" name="excel_file" accept=".csv">
</div>
</div>



	<div class="control-group">
											<div class="controls import-button">
												<button type="submit" name="import" class="btn">Import</button>
											
											</div>
										</div>
									</form>
							</div>
							<div class="data-img">
							    <h4>(* Use Below format to upload data and use .CSV extension file)</h4>
							    <img src="images/data.jpeg" alt="Image Format" width="100%" height="600">
							</div>
						</div>


 </form>

</body>
<?php } ?>