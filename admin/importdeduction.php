<?php
//load the database configuration file
include 'dbConfig.php';
$id = $_GET['class_id'];
$user_class = $_GET['class_name'];
$send ="?class_id=$id &class_name=$user_class";
if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                
                    //insert member data into database
                    $db->query("INSERT INTO deduction (`user_id`,`description`,`amount`,`date`) VALUES ('".$line[0]."','".$line[2]."','".$line[3]."',CURDATE())");
                }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '&status=succ';
        }else{
            $qstring = '&status=err';
        }
    }else{
        $qstring = '&status=invalid_file';
    }
}
echo $id;

//redirect to the listing page
header("Location: view_student.php".$send.$qstring);