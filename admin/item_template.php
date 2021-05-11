<?php
include 'dbConfig.php';
//get records from database
  $query = $db->query("SELECT * FROM items"); 

if($query->num_rows > 0){
    $delimiter = ",";
    $filename ="Items_Create_" . date('Y-m-d') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array('Item Name','Price','Quantity');
    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    
    while($row = $query->fetch_assoc()){
        $lineData = array("","","","");
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
    echo"<script type='text/javascript'> alert('There are no in this class')</script>";
    echo"<script type='text/javascript'>window.location.href='items.php' </script>";
}
exit;

?>
