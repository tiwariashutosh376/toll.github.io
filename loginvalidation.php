<?php

//  To Retrive data for login validation
// Login variables

 // username and password sent from form  
$LoginEmail = filter_input(INPUT_POST, 'your_Loginemail');
$LoginPass = filter_input(INPUT_POST, 'your_Loginpass');

if(!empty($LoginEmail) || !empty($LoginPass) )
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "TCS";

        // create connection

    $conn = new mysqli($host, $dbusername, $dbpassword,$dbname);
    if(mysqli_connect_error())
        {
            die('connect Error ('. mysqli_connect_errno().')' .mysqli_connect_error());
        }
    else{
        
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                 $sql="SELECT * FROM Users WHERE Email='$LoginEmail'";
                 $result=mysqli_query($conn,$sql);
                while ($row = $result->fetch_assoc()) 
                    {
                        //echo $row['Password']."<br>";

                        if($row['Password'] == $LoginPass && $row['Email'] == $LoginEmail )
                            {
                                if($row['Account_Type'] == 'admin')
                                    {
                                        header("Location: adminpage.html");    
                                    }
                                else 
                                    {
                                        header("Location: home.html");     
                                    }

                            }

                         else
                            {
                                echo "<script>alert('Invalid Email and Password.');document.location='index.html'</script>";
                                 exit();
                            }
                    }
                echo "<script>alert('Invalid Email and Password.');document.location='index.html'</script>";
                exit();     
            }
        }

}   
else
{
    echo "<script>alert('Feilds should not be empty.');document.location='index.html'</script>";
        die();
}

?>