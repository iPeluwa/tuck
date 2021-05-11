<?php
include 'dbConfig.php';
//get records from database
$id = $_GET['class_id'];
  $query = $db->query("SELECT * FROM users WHERE class_id=$id"); 

if($query->num_rows > 0){
    $delimiter = ",";
    $filename ="Deduct_" . date('Y-m-d') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array('User_id','Name','Description', 'Amount');
    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    
    while($row = $query->fetch_assoc()){
        $lineData = array($row['user_id'],$row['user_name'],"Type reason here",0);
        fputcsv($f, $lineData, $delimiter);
    }


    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="'.$filename.'";');

    //output all remaining data on a file pointer
    fpassthru($f);
}else{
    echo"<script type='text/javascript'> alert('There are no students in this class')</script>";
    echo"<script type='text/javascript'>window.location.href='view_student.php?$id' </script>";
}
exit;

?>
