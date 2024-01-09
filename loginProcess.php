<?php
session_start();
$_SESSION['valid_user'] = false;
if(isset($_POST['save']))
{
    extract($_POST);
    include 'dbconnect.php';
    $sql=mysqli_query($conn,"SELECT * FROM register where Email='$email' and Password='$pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {   
        $_SESSION['valid_user'] = true; 
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["Email"]=$row['Email'];
        $_SESSION["First_Name"]=$row['First_Name'];
        $_SESSION["Last_Name"]=$row['Last_Name'];
         
        header("Location: home.php"); 
        exit();
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>