<?php
include_once 'dbconnect.php';
$sql = "DELETE FROM courses WHERE Course_ID='" . $_GET["Course_ID"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location: Admin.php"); 
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>