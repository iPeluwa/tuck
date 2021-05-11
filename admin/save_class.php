
<?php
include("../db_conection.php");
if(isset($_POST['save_class']))
{
$class= $_POST['class'];

$save_class_details="insert into class (`name`,`date`) VALUE ('$class',CURDATE())";
mysqli_query($dbcon,$save_class_details);
echo "<script>alert('Class added successfully!')</script>";				
echo "<script>window.open('student.php','_self')</script>";
}

?>
