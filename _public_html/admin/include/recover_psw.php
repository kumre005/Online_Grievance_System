<?php session_start() ?>


<?php 
    if(isset($_POST["recover"])){
        include('connect/connection.php');
        $adminEmail = $_POST["adminmail"];

        $sql = mysqli_query($connect, "SELECT * FROM admin WHERE EmailId ='$adminEmail'");
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
            $token = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);
            

            //session_start ();
           

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
            $mail->addAddress($adminEmail);
            //$mail->addReplyTo('lamkaizhe16@gmail.com');

            // HTML body
            $mail->isHTML(true);
            $mail->Subject="Recover your password";
            $mail->Body='To reset your password click <a href="https://grievancenmiet.in/admin/include/reset_psw.php?token='.$token.'">here </a>. </br>Reset your password in a day.';
            if(!$mail->send()){
                ?>
                    <script>
                        alert("<?php echo " Invalid Email $adminEmail "?>");
                    </script>
                <?php
            }else{
                
                
                ?>
                
                    <script>
                    
                       window.location.replace("notification.html");
                    </script>
                    <?php
                     $codeQuery = mysqli_query($connect, "UPDATE admin SET token = '$token' WHERE EmailId = '$adminEmail'");
                  
                    ?>
                <?php
            }
        }
    }


?>
