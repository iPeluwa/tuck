<?php
//load the database configuration file
include 'dbConfig.php';
@@$id = $_GET['class_id'];
@@$user_class = $_GET['class_name'];
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
                //check whether member already exists in database with same email
                $prevQuery = "SELECT user_name FROM users WHERE email = '".$line[2]."'";
                $prevResult = $db->query($prevQuery);
                if(@@$prevResult->num_rows > 0){
                    //update member data
                      $db->query("UPDATE users SET user_name = '".$line[1]."', class_id = '".$line[0]."', user_gender = '".$line[3]."', user_rollno = '".$line[4]."', user_password = '".$line[5]."' WHERE email = '".$line[2]."'");
                }else{
                    //insert member data into database
                    $db->query("INSERT INTO users (`user_email`,`user_name`,`user_gender`,`user_rollno`,`class_id`,`user_password`,`date`) VALUES ('".$line[2]."','".$line[1]."','".$line[3]."','".$line[4]."','".$line[0]."','".$line[5]."',CURDATE())");
                }
            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '&status1=succ';
        }else{
            $qstring = '&status1=err';
        }
    }else{
        $qstring = '&status1=invalid_file';
    }
}

//redirect to the listing page
header("Location: view_student.php".$send.$qstring);