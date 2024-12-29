

<div class="span3 navigation" id="adminsidebar">
					<div class="sidebar">



		<ul class="widget widget-menu unstyled">
							<li><a href="dashboard.php"><i class="menu-icon icon-dashboard"></i>Dashboard</a></li>
							
					
						</ul>




<ul class="widget widget-menu unstyled">
							<li>
								<a class="collapsed" data-toggle="collapse" href="#togglePages">
									<i class="menu-icon icon-cog"></i>
									<i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
									Manage Complaint
								</a>
								<ul id="togglePages" class="collapse unstyled">
									<li>
										<a href="notprocess-complaint.php">
											<i class="icon-tasks"></i>
											Not Process Yet Complaint
											<?php
$subid=$_SESSION['suid'];
$state="new";  
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints 
join tblforwardhistory on tblforwardhistory.ComplaintNumber=tblcomplaints.complaintNumber	
	where state='$state'  and tblforwardhistory.ForwardTo='$subid'");
$num1 = mysqli_num_rows($rt);
{?>
		
											<b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
											<?php } ?>
										</a>
									</li>
									<li>
										<a href="inprocess-complaint.php">
											<i class="icon-tasks"></i>
											In Process Complaint
                   <?php 
  $state="in Process";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints
join tblforwardhistory on tblforwardhistory.ComplaintNumber=tblcomplaints.complaintNumber	
 where state='$state' and tblforwardhistory.ForwardTo='$subid'");
$num1 = mysqli_num_rows($rt);
{?><b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>
										</a>
									</li>
									<li>
										<a href="closed-complaint.php">
											<i class="icon-inbox"></i>
											Closed Complaints
	     <?php 
  $state="closed";                   
$rt = mysqli_query($con,"SELECT * FROM tblcomplaints
join tblforwardhistory on tblforwardhistory.ComplaintNumber=tblcomplaints.complaintNumber	
 where state='$state' and tblforwardhistory.ForwardTo='$subid' ");
$num1 = mysqli_num_rows($rt);
{?><b class="label green pull-right"><?php echo htmlentities($num1); ?></b>
<?php } ?>

										</a>
									</li>
								</ul>
							</li>
							
					
						</ul>


				<!--/.widget-nav-->

						<ul class="widget widget-menu unstyled">
					
							
							<li>
								<a href="logout.php">
									<i class="menu-icon icon-signout"></i>
									Logout
								</a>
							</li>
						</ul>

					</div><!--/.sidebar-->
				</div><!--/.span3-->
