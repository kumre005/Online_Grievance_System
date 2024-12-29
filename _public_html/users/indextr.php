<!-- Coding by CodingLab | www.codinglabweb.com -->
<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:../index.php');
}
else{ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="assets/css/child-style.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Dashboard Sidebar Menu</title> 
</head>
<body>

<?php include("includes/header.php");?>

<div class="usershome">
<?php include("includes/sidebar.php");?>
   

    <section class="home">
        <div class="text">Dashboard Sidebar</div>
    </section>
</div>
    <script src="assets/js/child-script.js"></script>

</body>
</html>