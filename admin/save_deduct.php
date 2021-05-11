
<?php
include("../db_conection.php");
if(isset($_POST['save_deduct']))
{
$id = $_GET['id'];   
$description= $_POST['description'];
$amount= $_POST['amount'];

$save_deduct_details="insert into deduction (`user_id`,`description`,`amount`,`date`) VALUE ('$id','$description','$amount',CURDATE())";
mysqli_query($dbcon,$save_deduct_details);
echo "<script>alert('Deducted $amount successfully!')</script>";				
echo "<script>window.open('student.php','_self')</script>";
}

?>
