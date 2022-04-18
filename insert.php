<?php

$fullName = filter_input(INPUT_POST, 'Full_Name');
$dob = filter_input(INPUT_POST, 'D_O_B');
$address = filter_input(INPUT_POST, 'address');
$contactNumber = filter_input(INPUT_POST, 'contactNO');
$email = filter_input(INPUT_POST, 'email_ID');
$type = filter_input(INPUT_POST, 'Account_type');
$RePassword = filter_input(INPUT_POST, 'Re_pass');

if(!empty($fullName) || !empty($dob) || !empty($address) || !empty($contactNumber) || !empty($email) || !empty($Re_pass))
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "TCS";

        // create connection

    $conn = new mysqli($host, $dbusername, $dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect Error ('. mysqli_connect_errno().')' .mysqli_connect_error());
    }else{
        $sql = "INSERT INTO Users (Full_Name, Date_of_Birth, Address, Contact_Number, Email,Account_Type, Password) values('$fullName','$dob','$address','$contactNumber','$email','$type', '$RePassword')";
        if($conn -> query($sql)){
            if($type == 'admin'){
                header("Location: adminpage.html");
            }
            else{
                   header("Location: Home.html");
               }
        }else{
            echo " Error:" . $sql ."<br>". $conn->error;
        }
        $conn->close();
      }
}   
else{
    echo "Feilds should not be empty";
        die();
}




?>
