<?php
session_start();
error_reporting(0);
include("users/includes/config.php");
$query = "SELECT AVG(rating) AS average_rating FROM feedback";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$averageRating = $row['average_rating'];
if(isset($_POST['submit']))
{
$ret=mysqli_query($con,"SELECT * FROM users WHERE username='".$_POST['username']."' and password='".($_POST['password'])."'");

$num=mysqli_fetch_array($ret);
if($num>0)
{

$classExtension ="show";
$extra="users/dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($con,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$errormsg="Invalid username or password";
$extra="login.php";




}
}


?>



<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>






<!DOCTYPE html>
<html lang="en">

  <head>
      <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-20JB8VZ142"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-20JB8VZ142');
</script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="Vz0V0KUC4wDqkmxaWffefTfaUsWLeOdcAI4LjXJJTV8" />
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	 <title>Welcome to GCOEC's Grievance Redressal Portal</title>
  <meta name="description" content="Welcome to GCOEC's Grievance Redressal Portal! Your trust and privacy matter to us. Rest assured, your information is secure and confidential. Start resolving issues now by raising a complaint – your voice matters! Click below to get started.">
<!--
   <title>NMIET GRC - Grievance & Engineering Excellence | Nutan Maharashtra Institute of Engineering & Technology</title>
  <meta name="description" content="Explore NMIET's GRC, the hub for Grievance Resolution and Engineering Excellence at Nutan Maharashtra Institute of Engineering & Technology. Discover top-notch education and dedicated grievance handling, ensuring your academic journey is seamless and enriching."> -->

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="assets/css/owl.css">
	<link rel="stylesheet" href="assets/css/child-style.css">
<link rel="stylesheet" href="assets/css/style14.css">
	<link rel="stylesheet" href="assets/css/animation1.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		   <script>
  $(document).ready(function(){
    $('.counter').counterUp({
      delay: 10,
      time: 1200
    });
  });
  </script> 
  <script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
   
<!--



Finance Business TemplateMo

https://templatemo.com/tm-545-finance-business

-->
<link rel="icon" href="fevicon.png" type="image/x-icon">
<link rel="shortcut icon" href="fevicon.png" type="image/x-icon">

  <style>
        /* Replace with your own star styling */
        .stars {
            display: inline-block;
        }
        .star {
            color: gold;
            font-size:2.5em;
        }
        
        .feedcount{
            font-size:26px;
        }
        
          #videoContainer {
            display: none;
        }
    </style>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->

   
    <div class="sub-header">
      <div class="container">
        <div class="row">
        <div class="news">
          <marquee>
            <p>
            Dial Police:112 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chandrapur Control Room:9529691766 &nbsp; &nbsp; Chabdrapur (Whatsapp):9307945283  &nbsp;  &nbsp; Public Relations Officer:9922007722  &nbsp; &nbsp; Women Safety:1091  &nbsp; &nbsp; Cyber Help:1930  &nbsp; &nbsp; Cyber Complaint Website:www.cybercrime.gov.in &nbsp;&nbsp; Lost Mobile Complaint:ceir.gov.in
          </p>
          </marquee>
        </div>
      </div>
        </div>
      </div>
    
    
	
   
<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
             <a class="navbar-brand-logo" href="index.php">
 <img width="00px" height="auto" src=""></a>
      <ul>
        <li><a class="active" href="#">Home</a></li>
        <li class="view-login-modal loginsuccessful <?php echo $classExtension; ?>">
          <a class="nav-link" href="#">User Login</a></li>
            <li><a href="admin/index.php">Committee Login</a></li>
            <li><a href="about.php">About Us</a></li>
      </ul>
    </nav>
    
   

    <!-- Page Content -->
   

    <!-- Banner Starts Here -->
 
	 <div class="landing-page">
	  <div class="content">
          <div class="container">
            <div class="info">
               <h1>Welcome to GCOEC's Grievance Redressal Portal</h1>
			  
              <p style="margin-top:10px;"><!--"At our platform, we prioritize your concerns and provide a reliable space to<br> address them effectively. We understand the importance of trust, which is <br> why we assure you that your information is secure and confidential  your <br>data will never be shared with anyone. Our  user-friendly interface empowers <br> you to get started on resolving issues quickly. Join us in making a difference <br>by raising a complaint today. Your voice matters, and together, we can create <br> a positive change. Click the button below to get started and let your concerns<br> be heard."-->
			  " Welcome to GCOEC's Grievance Redressal Portal! Your trust and privacy matter to us. Rest assured, your information is secure and confidential. Start resolving issues now by raising a complaint – your voice matters! Click below to get started.
			  </p>
              <a href="#"><button>We are ready to help you!</button></a>
            </div>
            <div class="image">
              <img src="home.png">
            </div>
          </div>
        </div>
		</div>
		
    
    <!-- Banner Ends Here -->
	
    
	
	
 <div class="popup">
    <header>
      
      <div class="close"><i class="fa-solid fa-xmark fa-2xl"></i></div>
    </header>
    <div class="content field">

        <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="assets/images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">WE ARE READY TO HELP YOU <br>"हस्तसहायतां, जीवनं परिवर्तयन्।"</span>
          <span class="text-2">Connect to Create Positive Change</span>
        </div>
      </div>
      <div class="back">
        <!--<img class="backImg" src="images/backImg.jpg" alt="">-->
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
    
                <div class="form-content">
                      
                    <div class="login-form login-wrap" id="login-form">
                        <div class="title">Login</div>
                        <input type="checkbox" id="forget">
                        <form class="form-login" name="login" method="post">
 <p style="padding-left:4%; padding-top:2%;  color:red">
		        	<?php if($errormsg){
echo htmlentities($errormsg);
		        		}?></p>

		        		<p style="padding-left:4%; padding-top:2%;  color:green">
		        	<?php if($msg){
echo htmlentities($msg);
		        		}?></p>
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" placeholder="Enter your PRN No / Emp ID" name="username" placeholder="username"  required autofocus>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Enter your password (ERP No/ Emp ID)"  name="password" required>
              </div>
              <div class="text"><label for="forget">Forgot password?</label></div>
              <div class="button input-box">
                <button class="btn btn-theme btn-block" name="submit" type="submit"></i> SIGN IN</button>
              </div>
     
            </div>
        </form>
        
            <?php session_start(); ?>
                   <form class="form-forgot-password" id="form-forgot-password"  method="POST" name="recover_psw">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" id="userEmail" class="form-control" name="userEmail" required autofocus>
                            </div>
                           
                            <div class="button input-box">
                               <input type="submit" value="Recover" name="recover">
                            </div>
                        </form>
                     
                        
      </div>
       
    </div>
  </div>
       
    </div>
  </div>
  </div>





    <div class="fun-facts">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="left-content">
              
              <h2>Grievance Redressal Procedure: <em> Your Concerns Matter</em></h2>
         <p>
  At GCOEC's Grievance Redressal Portal, we encourage you to voice your concerns through our grievance redressal mechanism. You can submit your grievance in writing or by using the format available in the admin department. Simply drop it in designated boxes for grievance submissions.

  Our dedicated Grievance Cell takes action on cases forwarded with the necessary documents. We prioritize prompt and effective resolution of grievances within a stipulated time limit. Rest assured, we are committed to ensuring that your grievance is properly addressed and resolved to your satisfaction.

  For your convenience, you can also lodge your grievance through our online mechanism. Click on the link provided below to submit your grievance online and initiate the resolution process.
</p>
 </div>
 <br>
<button id="openPopupp" onclick="toggleVideo()">Know More...</button>
 <div id="videoContainer">
     <iframe id="youtubeIframe" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
        
    </div>


<script>
        function toggleVideo() {
            var videoContainer = document.getElementById("videoContainer");
            var youtubeIframe = videoContainer.querySelector("#youtubeIframe");

            if (videoContainer.style.display === "none") {
                videoContainer.style.display = "block";
                youtubeIframe.src = "https://www.youtube.com/embed/6VUjvjyyYrA";
            } else {
                videoContainer.style.display = "none";
                youtubeIframe.src = "";
            }
        }
    </script>
             
           
          </div>
		  
          <div class="col-md-5 align-self-center">
            <div class="row">

-->
<img src="assets/images/complaintraise.png" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="mission_vission desktop">
    <div class="container">
	<div class="roww">
    <div class="col-sm cardd vission">
		<div class="col-sm image">
		  <img src="assets/images/vision.jpg" class="card-img-top" alt="...">
		</div>
		<div class="col-sm title">
		  <h1>Vision : Enhancing Grievance Redressal and College Environment</h1>
		   <p>" Our vision at GCOEC's Grievance Redressal Portal is to enhance the college environment by providing a harmonious space where every student's concerns and grievances are thoughtfully addressed. We strive to promote a culture of open communication, trust, and continuous improvement, fostering a sense of community and empowerment among all stakeholders. Through this commitment, we aim to achieve the highest standards of student satisfaction, academic growth, and a sense of belonging within the GCOEC family."</p>
		</div>		
    </div>	
	<div class="col-sm cardd mission">
		<div class="col-sm image">
		  <img src="assets/images/mission.png" class="card-img-top" alt="...">
		</div>
		<div class="col-sm title">
		  <h1>Mission : Enabling Efficient Grievance Redressal in the College Community</h1>
		   <p>"Our mission at GCOEC's Grievance Redressal Portal is to enable efficient grievance redressal within the college community. We are dedicated to providing a transparent and efficient platform for students to voice their concerns and grievances, ensuring timely resolution. This mission contributes to fostering a positive college experience by addressing grievances effectively and promoting a culture of openness and responsiveness."</p>
		</div>		
    </div>
	<div class="col-sm cardd values">
		<div class="col-sm image">
		  <img src="assets/images/values.jpg" class="card-img-top" alt="...">
		</div>
		<div class="col-sm title">
		  <h1>Our Values: Guiding Principles for Grievance Redressal</h1>
		   <p>"At GCOEC's Grievance Redressal Portal, our values serve as guiding principles for our grievance redressal process. We are committed to transparency, accountability, empathy, fairness, collaboration, continuous improvement, and confidentiality. Our core values prioritize open and honest communication, holding ourselves accountable for our actions, understanding the perspectives of the students, treating all complaints impartially, encouraging collaboration, refining our system based on feedback, and respecting the privacy of our students."</p>
		</div>		
    </div>
  </div>
</div>
</div>

<div class="mission_vission mobile">
    <div class="container">
		<div class="roww">
    <div class="col-sm cardd vission">
		
		<div class="col-sm title">
		   <h1>Vision : Enhancing Grievance Redressal and College Environment</h1>
		  <div class="col-sm image">
		  <img src="assets/images/vision.jpg" class="card-img-top" alt="...">
		</div>
  <p>" Our vision at GCOEC's Grievance Redressal Portal is to enhance the college environment by providing a harmonious space where every student's concerns and grievances are thoughtfully addressed. We strive to promote a culture of open communication, trust, and continuous improvement, fostering a sense of community and empowerment among all stakeholders. Through this commitment, we aim to achieve the highest standards of student satisfaction, academic growth, and a sense of belonging within the GCOEC family."</p>
		</div>		
    </div>	
	<div class="col-sm cardd mission">
		
		<div class="col-sm title">
		  <h1>Mission : Enabling Efficient Grievance Redressal in the College Community</h1>
		  <div class="col-sm image">
		  <img src="assets/images/mission.png" class="card-img-top" alt="...">
		</div>
		     <p>"Our mission at GCOEC's Grievance Redressal Portal is to enable efficient grievance redressal within the college community. We are dedicated to providing a transparent and efficient platform for students to voice their concerns and grievances, ensuring timely resolution. This mission contributes to fostering a positive college experience by addressing grievances effectively and promoting a culture of openness and responsiveness."</p>
		</div>		
    </div>
	<div class="col-sm cardd values">
		
		<div class="col-sm title">
		  <h1>Our Values: Guiding Principles for Grievance Redressal</h1>
		  <div class="col-sm image">
		  <img src="assets/images/values.jpg" class="card-img-top" alt="...">
		</div>
		   		   <p>"At GCOEC's Grievance Redressal Portal, our values serve as guiding principles for our grievance redressal process. We are committed to transparency, accountability, empathy, fairness, collaboration, continuous improvement, and confidentiality. Our core values prioritize open and honest communication, holding ourselves accountable for our actions, understanding the perspectives of the students, treating all complaints impartially, encouraging collaboration, refining our system based on feedback, and respecting the privacy of our students."</p>
		</div>		
    </div>
  </div>
</div>
</div>


<?php
session_start();
include('include/config.php');

// SQL query to count rows for each state and total count
$query = "
    SELECT
        SUM(CASE WHEN state = 'New' THEN 1 ELSE 0 END) AS count_new,
        SUM(CASE WHEN state = 'in process' THEN 1 ELSE 0 END) AS count_in_process,
        SUM(CASE WHEN state = 'closed' THEN 1 ELSE 0 END) AS count_closed,
        COUNT(*) AS total_count
    FROM tblcomplaints;
";



// Prepare the statement
$stmt = $con->prepare($query);

if ($stmt) {
    // Execute the query
    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_assoc();
    $count_new = $row['count_new'];
    $count_in_process = $row['count_in_process'];
    $count_closed = $row['count_closed'];
    $total_count = $row['total_count'];
    
    $stmt->close();
} else {
    echo "Statement preparation error: " . $con->error;
}


?>

<div class="counter-up">

    <div class="content">
	<h2>Our Complaints</h2>
        <div class="box">
            <div class="icon"><i class="fas fa-gift"></i></div>
            <div class="count-digit"><?php echo $count_new; ?></div>
            <div class="text">New Complaints</div>
        </div>
        <div class="box">
            <div class="icon"><i class="fas fa-gift"></i></div>
            <div class="count-digit"><?php echo $count_in_process; ?></div>
			<div class="text">In Process Complaints</div>
		</div>
		 <div class="box">
            <div class="icon"><i class="fas fa-gift"></i></div>
            <div class="count-digit"><?php echo $count_closed; ?></div>
			<div class="text">Closed Complaints</div>
		</div>
		 <div class="box">
            <div class="icon"><i class="fas fa-gift"></i></div>
            <div class="count-digit"><?php echo $total_count; ?></div>
			<div class="text">Total Complaints</div>
		</div>
		</div>
		</div>

    <div>
        <br>
        <br>
        <h2 style="text-align:center;font-weight:bold;">Average Resolved Time</h2>
        <br>
        

		    	<?php include("include/averageresolvedchart.php");  ?>
		</div> 




  
  

 

<br>
<br>
	<div class="averageresolved" style="text-align:center;">
	     <h2>Average Rating</h2>
    <div class="stars">
        <?php
        // Generate star representation based on average rating
        for ($i = 1; $i <= 5; $i++) {
            if ($averageRating >= $i) {
                echo '<span class="star">&#9733;</span>';
            } elseif ($averageRating > ($i - 1)) {
                echo '<span class="star">&#9734;</span>';
            } else {
                echo '<span class="star">&#9734;</span>';
            }
        }
        $feedquery = " SELECT COUNT(*) AS total_feedcount FROM feedback";
        $stmtt = $con->prepare($feedquery);

if ($stmtt) {
     $stmtt->execute();

    $result = $stmtt->get_result();
     $row = $result->fetch_assoc();
    $total_feedcount = $row['total_feedcount'];?>
    <span class="feedcount"> <?php echo ' (' . $total_feedcount . ')'; ?> </span>
    <?php
}
        ?>
    </div>
    </div>
 
    <!-- Footer Starts Here -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-item">
            <img width="0px" height="auto" src=""></a>
            <p>Follow Us and Stay Connected with us on social media</p>
			<br>
            <ul class="social-icons">
              <li><a rel="nofollow" href="" target="_blank"><i class="fa-brands fa-facebook" style="color: #6a54d9;"></i></a></li>
              <li><a href=""><i class="fa-brands fa-instagram" style="color: #6a54d9;"></i></a></li>
              <li><a href=""><i class="fa-brands fa-linkedin" style="color: #6a54d9;"></i></a></li>
			  <li><a href=""><i class="fa-brands fa-twitter" style="color: #6a54d9;"></i></a></li>
           
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Useful Links</h4>
            <ul class="menu-list">
              <li><a href="https://www.gcoec.ac.in/">GCOEC</a></li>
              <li><a href="http://www.unigug.ac.in/">Gondwana University, Gadchiroli</a></li>
              <li><a href="https://mahadbtmahait.gov.in/login/login">MahaDBT</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Quick Links</h4>
            <ul class="menu-list">
              <li><a href="about.html">About Us</a></li>
              <li><a href="#">How We Work</a></li>
              <li><a href="#">Quick Support</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="feedback.php">Feedback</a></li>
            </ul>
          </div>
		  <div class="col-md-3 footer-item">
            <h4>Contact Us</h4>
            <ul class="menu-list">
			<table>
            <tr> <td><i class="fa-solid fa-location-dot fa-xl" style="color: #6a54d9;;padding-right:16px;"></i>&nbsp;&nbsp;<td><a href="#"> Government College of Engineering Chandrapur, Maharashtra </a></tr>
              <tr><td><i class="fa-solid fa-envelope fa-lg" style="color: #6a54d9;padding-right:16px;"></i></i></td>&nbsp;&nbsp;<td><a href="#">GCOEC@gmail.com</a></td></tr>
              <tr><td><i class="fa-solid fa-phone fa-lg" style="color: #6a54d9;;padding-right:16px;"></i></td>&nbsp;&nbsp;<td><a href="#">+91 9359840399</a></td>
           
            </table>
			</ul>
          </div>
		  
		  <!--
          <div class="col-md-3 footer-item last-item">
            <h4>Contact Us</h4>
            <div class="contact-form">
              <form id="contact footer-contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>-->
        </div>
      </div>
    </footer>
    
    <div class="mobilefooter">
       <p style="text-align:center;"> <img width="0px" height="auto" src=""></a></p>
            <p style="text-align:center;">Follow Us and Stay Connected with us on social media</p>
            
            <div class="social-icons" style="justify-content:center;">
              <li><a rel="nofollow" href="https://www.facebook.com/NMIETTalegaon?mibextid=ZbWKwL" target="_blank"><i class="fa-brands fa-facebook" style="color: #6a54d9;"></i></a></li>
              <li><a href="https://instagram.com/nmietpune?igshid=MzRlODBiNWFlZA=="><i class="fa-brands fa-instagram" style="color: #6a54d9;"></i></a></li>
              <li><a href="https://instagram.com/nmietpune?igshid=MzRlODBiNWFlZA=="><i class="fa-brands fa-linkedin" style="color: #6a54d9;"></i></a></li>
			  <li><a href="https://twitter.com/NmietP?t=Hwzd7iU0e5UJh7P-WSfXSg&s=09"><i class="fa-brands fa-twitter" style="color: #6a54d9;"></i></a></li>
           
            </div>
<input type="checkbox" id="title1" />
<label for="title1"><h5>Useful Links</h5> </label>

<div class="content">

<p>
             <li><a href="https://www.gcoec.ac.in/">GCOEC</a></li>
              <li><a href="http://www.unigug.ac.in/">Gondwana University, Gadchiroli</a></li>
              <li><a href="https://mahadbtmahait.gov.in/login/login">MahaDBT</a></li>
            </p>

</div>

<input type="checkbox" id="title2" />
<label for="title2">  <h5>Quick Links</h5> </label>

<div class="content">

<p> <li><a href="about.php">About Us</a></li>
              <li><a href="#">How We Work</a></li>
              <li><a href="#">Quick Support</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="feedback.php">Feedback</a></li></p>

</div>

<input type="checkbox" id="title3" />
<label for="title3"> <h5>Contact Us</h5> </label>

<div class="content">

<p><table>
            <tr> <td><i class="fa-solid fa-location-dot fa-xl" style="color: #6a54d9;;padding-right:16px;"></i>&nbsp;&nbsp;<td><a href="#">  Government College of Engineering Chandrapur, Maharashtra</a></tr>
              <tr><td><i class="fa-solid fa-envelope fa-lg" style="color: #6a54d9;padding-right:16px;"></i></i></td>&nbsp;&nbsp;<td><a href="#">GCOEC@gmail.com</a></td></tr>
              <tr><td><i class="fa-solid fa-phone fa-lg" style="color: #6a54d9;;padding-right:16px;"></i></td>&nbsp;&nbsp;<td><a href="#">+91 9359840399</a></td>
           
            </table></p>

</div>
</div>


    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span>Copyright &copy; 2024 Team- Grievance Redressal Cell,</span><span class="nmiet"> GCOEC
            
           </span>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
    
    <script>
    // Get references to elements
    var openPopupBtn = document.getElementById("openPopupp");
    var closePopupBtn = document.getElementById("closePopupp");
    var popupContainer = document.getElementById("popupContainerr");

    // Open popup
    openPopupBtn.addEventListener("click", function() {
        popupContainer.style.display = "flex";
    });

    // Close popup
    closePopupBtn.addEventListener("click", function() {
        popupContainer.style.display = "none";
    });
</script>

 <script>
    const viewBtn = document.querySelector(".view-login-modal"),
    popup = document.querySelector(".popup"),
    close = popup.querySelector(".close"),
    field = popup.querySelector(".field"),
    input = field.querySelector("input"),
    copy = field.querySelector("button");

    viewBtn.onclick = ()=>{
      popup.classList.toggle("show");
    }
    close.onclick = ()=>{
      viewBtn.click();
    }
	


  
  </script>
 <script src="users/assets/js/jquery.js"></script>
    <script src="users/js/bootstrap.min.js"></script>
 

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  
  <?php
include("login-system-main/recover_psw.php");?>  
  </body>
</html>