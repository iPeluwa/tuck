<?Php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************
// 
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
////// Your Database Details here /////////
////////////////////////////
require "config.php"; // Database Connection 
///////////////////////////
//////////////////////////////// Main Code sarts /////////////////////////////////////////////
@$class_id=$_GET['class_id'];
//$class_id=1;

if(!is_numeric($class_id)){
$message.="Data Error |";
exit;
}

if($class_id>0){
$sql="select * from users where class_id=$class_id order by user_name";
}else{
$sql="select * from users order by user_name ";
$class_id=0;
}
//////// collecting data from table ////////
$row=$DB_con->prepare($sql);
$row->execute();
$result=$row->fetchAll(PDO::FETCH_ASSOC);
//////////////
@$main = array('data'=>$result,'value'=>array("class_id"=>"$class_id","message"=>"$message"));
echo json_encode($main);  // Json string returned 

?>
 


