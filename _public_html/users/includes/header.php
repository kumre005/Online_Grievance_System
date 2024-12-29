 
 <?php
session_start();
error_reporting(0);
include('includes/config.php');
 
  $query=mysqli_query($con,"select * from users where username='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
 <header class="header black-bg">
              
            <!--logo start-->
            
             
                 <div class="col-sm-9">
			  	<a class="brand" href="dashboard.php" style="display: flex;    padding: 5px;">
			  	    <img width="0px" height="60" src="">
			  		<h1 class="desktop-heading" style="    padding-left: 25px;">GCOEC'S GRIEVANCE REDRESSAL CELL</h1>
			  		<h3 class="mobile-heading" style="    padding-left: 25px;">GCOEC'S GRC</h3>
			  	</a>
			  	</div>
            
            
                
            <div class="col-sm-3 top-menu">
            
                
            	<ul class="nav pull-right top-menu">
            	    
                    <h4 class="mb">
                        
					<?php $userphoto= hex2bin($row['userImage']);
							
							?>
					<img src="userimages/userlogo.jpg" width="50" height="50">&nbsp;&nbsp; Hello  <?php echo htmlentities($row['username']);?></h4>
					
				
            	</ul>
            </div>
        </header>
 <?php	} ?> 
 
