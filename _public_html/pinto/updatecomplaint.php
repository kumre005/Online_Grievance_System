<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:../admin/index.php');
}
else {
  if(isset($_POST['update']))
  {
$complaintnumber=$_GET['cid'];
$status=$_POST['status'];
$remark=$_POST['remark'];
$query=mysqli_query($con,"insert into complaintremark(complaintNumber,status,remark) values('$complaintnumber','$status','$remark')");
$sql=mysqli_query($con,"update tblcomplaints set status='$status' where complaintNumber='$complaintnumber'");

echo "<script>alert('Complaint details updated successfully');</script>";

  }

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
<link href="../assets/css/child-style.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#80b9ce;>

<div style="margin-left:50px;">
 <form name="updateticket" id="updatecomplaint" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Complaint Number</b></td>
      <td><?php echo htmlentities($_GET['cid']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Status</b></td>
      <td><select name="status" required="required" style="    width: 173px;
    height: 26px;
    border-radius: 10px;">
      <option value="">Select Status</option>
      <option value="in process">In Process</option>
    <option value="closed">Closed</option>
        
      </select></td>
    </tr>


      <tr height="50">
      <td><b>Remark</b></td>
      <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>
    
    
    <tr height="50">
      <td><b>Evidence</b></td>
      <td><input  type="file"  class="uploaddoc" style=" color: #fff;
    background-color: #248aaf;
    border-color: #20799a;
    width: 210px;
    height: 26px;
    border-radius: 10px;  background-image: url(imgs/upload.png) !important;
        background-position: right !important;
    background-repeat: no-repeat !important;
    background-origin: content-box !important;"></td>
    </tr>


        <tr height="50">
      <td>&nbsp;</td>
      <td><input class="submit1" type="submit" name="update" value="Submit" style=" color: #fff;
    background-color: #248aaf;
    border-color: #20799a;
    width: 130px;
    height: 26px;
    border-radius: 10px;"></td>
    </tr>



       <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
  <td></td>
      <td >   
      <input class="submit" name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;color: #fff;
    background-color: #248aaf;
    border-color: #20799a;
    width: 150px;
    height: 27px;
    border-radius: 10px;"/><td>
    </tr>
   

 
</table>
 </form>
</div>

</body>
</html>

     <?php } ?>