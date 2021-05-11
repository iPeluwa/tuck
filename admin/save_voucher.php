
<?php
include("../db_conection.php");
if(isset($_POST['voucher_save']))
{

$voucher = substr(number_format(time() * rand(), 0, '',''),0,9);
$amount = $_POST['amount'];
$status='0';




 
$save_vouch_details="insert into voucher (voucher,amount,status) VALUE ('$voucher','$amount','$status')";
mysqli_query($dbcon,$save_vouch_details);
echo "<script>alert('Voucher generated successfully!')</script>";				
echo "<script>window.open('voucher.php','_self')</script>";


				
	
			
		
	
		

}

?>
