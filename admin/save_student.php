
<?php
include("../db_conection.php");
if(isset($_POST['student_save']))
{
$user_email = $_POST['email'];
$user_password = $_POST['password'];
$user_firstname = $_POST['fname'];
$user_lastname= $_POST['lname'];
$user_class= $_POST['class'];

$save_student_details="insert into users (`user_email`, `user_password`, `user_firstname`, `user_lastname`, `user_class`,`date`) VALUE ('$user_email','$user_password','$user_firstname','$user_lastname','$user_class',CURDATE())";
mysqli_query($dbcon,$save_student_details);
echo "<script>alert('Student added successfully!')</script>";				
echo "<script>window.open('student.php','_self')</script>";
}

?>
