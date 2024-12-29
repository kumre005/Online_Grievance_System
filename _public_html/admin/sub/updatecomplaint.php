<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['subalogin'])==0)
  { 
header('location:index.php');
}
else {
  if(isset($_POST['update']))
  {
$complaintnumber=$_GET['cid'];
$state=$_POST['state'];
$remark=$_POST['remark'];
$sadminid=$_SESSION['suid'];
$evfile=$_FILES["evfile"]["name"];

if (move_uploaded_file($_FILES["evfile"]["tmp_name"], "../../users/complaintdocs2/" . $_FILES["evfile"]["name"])) {
    echo "File moved successfully to complaintdocs folder.<br>";
    $query = mysqli_query($con, "UPDATE tblcomplaints SET evFile = '$evfile' WHERE complaintNumber = '$complaintnumber'");

} else {
    // Get the last error that occurred
    $error = error_get_last();
    if ($error !== null) {
        echo "Error moving file to complaintdocs folder: " . $error['message'] . "<br>";
    } else {
        echo "Unknown error moving file to complaintdocs folder.<br>";
    }
}


$query=mysqli_query($con,"insert into tblsubadminremark(ComplainNumber,ComplainStatus,ComplainRemark,RemarkBy) values('$complaintnumber','$state','$remark','$sadminid')");
$sql=mysqli_query($con,"update tblcomplaints set state='$state' where complaintNumber='$complaintnumber'");

echo "<script>alert('Complaint details updated successfully');</script>";
if($state == 'closed'){
 echo "<script>alert('Complaint details updated');</script>";   
$query=mysqli_query($con,"select tblcomplaints.*,users.fullName as name,users.userEmail as email, category.categoryName as catname from tblcomplaints join users on users.id=tblcomplaints.userId join category on category.id=tblcomplaints.category where tblcomplaints.complaintNumber='".$_GET['cid']."'");
while($row=mysqli_fetch_array($query))
{
    
$a = $row['email'];
$b = $row['name'];
 
}

  require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            // h-hotel account
            $mail->Username='nmietgrievance@gmail.com';
            $mail->Password='byxwyjonjhaprsau';

            // send by h-hotel email
            $mail->setFrom('nmietgrievance@gmail.com', 'Grievance NMIET complaint update');
            // get email from input
            $mail->addAddress($a);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Your Recent Complaint";
            $mail->Body="<b>Dear $b</b>
           <p>We hope this message finds you well. We are writing to inform you that your recent complaint has been successfully addressed and resolved to your satisfaction. We greatly appreciate your patience and understanding throughout this process.</p>
      <p>We encourage you to check your account dashboard <a href='https://grievancenmiet.in/'>login</a> for any updates related to your complaint. If you have any additional questions or require further assistance, please don't hesitate to reach out to our support team. We are here to assist you in any way we can.</p>
      <p>Thank you once again for bringing this matter to our attention. We look forward to serving you with the same level of commitment in the future.</p>
    <p>If you'd like to provide feedback about your experience, please <a href='https://grievancenmiet.in/feedback.php'>click here</a>.</p>
  
            <br><br>
            <p>With regrads,</p>
            <b>Grievance Support Team</b>";
            
            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                   
                <?php
            }
}

  }

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Profile</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#80b9ce;>

<div style="margin-left:50px;">
 <form name="updateticket" id="updatecomplaint" method="post" enctype="multipart/form-data"> 
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
      <td><select name="state" required="required" style="    width: 173px;
    height: 26px;
    border-radius: 10px;">
      <option value="">Select Status</option>
      <option value="new">New</option>
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
      <td><input  type="file" name="evfile"  class="uploaddoc form-control" value="" style=" color: #fff;
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