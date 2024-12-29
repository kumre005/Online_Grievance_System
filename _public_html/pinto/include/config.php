<?php
define('DB_SERVER','localhost');
define('DB_USER','u492530099_nmietgrc');
define('DB_PASS' ,'Omkar@133');
define('DB_NAME', 'u492530099_nmiet');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>