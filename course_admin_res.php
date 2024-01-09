<?php
extract($_POST);
include("dbconnect.php");
$sql=mysqli_query($conn,"SELECT * FROM courses where Course_Name ='$Course_Name'");
if(mysqli_num_rows($sql)>0)
{
    echo "Email Id Already Exists"; 
	exit;
}
else(isset($_POST['save']));
{
    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $folder="Course_Image/";
    $new_file_name = strtolower($file);
    $final_file=str_replace(' ','-',$new_file_name);
    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        $query="INSERT INTO courses(Course_C,Course_Name, Course_Description, Course_Link,Course_pic, Course_MRP,Course_OP ) VALUES ('$Course_C', '$Course_Name','$Course_Description' ,'$Course_Link', '$final_file' , '$Course_MRP','$Course_OP')";
        $sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
        header ("Location: admin.php?status=success");
    }
    else 
    {
		echo "Error.Please try again";
	}
}

?>