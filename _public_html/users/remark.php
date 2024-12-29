
<?php $ret=mysqli_query($con,"select complaintremark.remark as remark,complaintremark.status as sstatus,complaintremark.remarkDate as rdate from complaintremark join tblcomplaints on tblcomplaints.complaintNumber=complaintremark.complaintNumber where complaintremark.complaintNumber='".$_GET['cid']."'");
while($rw=mysqli_fetch_array($ret))
{
?>


Admin: <?php echo  htmlentities($rw['remark']);<br>
Remark Date :<?php echo  htmlentities($rw['rdate']); ?
<?php }?>









