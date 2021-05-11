<?php
include_once 'db_connection_vales.php';
$dbcon=mysqli_connect("$daddress","$dname","$dpass");
mysqli_select_db($dbcon,"$tname");

?>