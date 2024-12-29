<?php
use SimpleExcel\SimpleExcel;

if(isset($_POST['import'])){

    if(move_uploaded_file($_FILES['excel_file']['tmp_name'],$_FILES['excel_file']['name'])){
        require_once('SimpleExcel/SimpleExcel.php'); 
        
        $excel = new SimpleExcel('csv');                  
        $excel->parser->loadFile($_FILES['excel_file']['name']);           
        
        $foo = $excel->parser->getField(); 
    
        $count = 1;
        $db = mysqli_connect('localhost','u624446011_grc1','Omkar@133','u624446011_grc');
     
        while(count($foo)>$count){
            $rn=rand(1,9999);
            $fullName = $foo[$count][0];
            $userEmail = $foo[$count][1];
            $contactNo = $foo[$count][2];
            $username = $foo[$count][3];
            $city = $foo[$count][4];
            $address = $foo[$count][5];
            $pincode = $foo[$count][6];
            
            
            // Set password to the username
            $password = $username;
    
            $query = "INSERT INTO users (id,fullName,userEmail,password,contactNo,username,city,address,pincode) ";
            $query.="VALUES ('$rn','$fullName','$userEmail','$password','$contactNo','$username','$city','$address','$pincode')";
            mysqli_query($db,$query);
            $count++;
        }
    
        echo "<script>window.location.href='adddata.php';</script>";
    }
}
?>
