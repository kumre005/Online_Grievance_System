<?php
include('includes/config.php');
if(!empty($_POST["catid"])) 
{
 $id=intval($_POST['catid']);
 if(!is_numeric($id)){
 
 	echo htmlentities("invalid industryid");exit;
 }
 else{
 $stmt = mysqli_query($con,"SELECT priorityId FROM category WHERE id ='$id'");
 ?><?php
 while($row=mysqli_fetch_array($stmt))
 {
  ?>
  <option value="<?php echo htmlentities($row['priorityId']); ?>"> <?php echo htmlentities($row['priorityId']); ?></option>
  <?php
 }
}

}
?>