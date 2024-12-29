

<?php 

    if(isset($_POST["recover"])){
        include('connect/connection.php');
        $userEmail = $_POST["userEmail"];

        $sql = mysqli_query($connect, "SELECT * FROM users WHERE userEmail='$userEmail'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if(mysqli_num_rows($sql) <= 0){
            ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
            <?php
        }else if($fetch["status"] == 0){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("index.php");
               </script>
           <?php
        }else{
            // generate token by binaryhexa 
            
            function generateToken($length = 32) {
                return bin2hex(random_bytes($length));
            }
            
           
                
            
                // Generate a token and store it in session
                session_start() ;
                $token = generateToken();
                $_SESSION['token'] = $token;
                $_SESSION['userEmail'] = $userEmail;
            
                // Send the reset link to the user's email with the token
                // ... Code to send the email ...
            

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
            $mail->setFrom('nmietgrievance@gmail.com', 'Password Reset');
            // get email from input
            $mail->addAddress($_POST["userEmail"]);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body="<b>Dear User</b>
            <h3>We received a request to reset your password.</h3>
            <p>Kindly click the below link to reset your password</p>
           
            https://grievancenmiet.in/login-system-main/reset_psw.php
            <br><br>
            <p>With regrads,</p>
            <b>Grievance NMIET Team</b>";

            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email "?>");
                    </script>
                <?php
            }else{
                ?>
                    <script>
                        window.location.replace("login-system-main/notification.html");
                    </script>
                <?php
            }
        }
    }


?>
