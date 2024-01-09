<?php
extract($_POST);
include("dbconnect.php");
$sql=mysqli_query($conn,"SELECT * FROM teacher where Teacher_email ='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}
else(isset($_POST['save']));
{
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder="Teacher_Image/";
    $new_file_name = strtolower($file);
    $final_file=str_replace(' ','-',$new_file_name);
    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $query="INSERT INTO teacher(Teacher_Name, Teacher_quali, Teacher_email,Teacher_pass, Teacher_photo ) VALUES ('$first_name', '$last_name', '$email', '$pass', '$final_file')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: admin.php?status=success");
    }
    else 
    {
		echo "Error.Please try again";
	}
}

?>