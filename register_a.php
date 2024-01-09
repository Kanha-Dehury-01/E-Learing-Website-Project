<?php
extract($_POST);
include("dbconnect.php");

$sql=mysqli_query($conn,"SELECT * FROM register where Email='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}
else(isset($_POST['save']));
{
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder="Student_Image/";
    $new_file_name = strtolower($file);
    $final_file=str_replace(' ','-',$new_file_name);
    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $query="INSERT INTO register(First_Name, Last_Name, Email, Password, File,Address,District, State,Country,PIN ) VALUES ('$first_name', '$last_name', '$email', '$pass', '$final_file','$add','$dis','$state','$country','$pin')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: index.php?status=success");
    }
    else 
    {
		echo "Error.Please try again";
	}
}

?>