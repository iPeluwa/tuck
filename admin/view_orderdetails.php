<?php include_once 'header.php' ?>
<script src="../assets/jquery.min.js"></script>


<?php
	require_once 'config.php';
	if(isset($_GET['deleteorder_id']))
	{
		$stmt_delete = $DB_con->prepare('DELETE FROM orderdetails WHERE order_id =:order_id');
		$stmt_delete->bindParam(':order_id',$_GET['deleteorder_id']);
		$stmt_delete->execute();
		header("Location: orderdetails.php");
	}
?>

<?php
	if(isset($_GET['confirmorder_id']))
   {		
		$stmt_update = $DB_con->prepare('UPDATE orderdetails SET status_verify = "confirmed" WHERE order_id =:order_id');
		$stmt_update->bindParam(':order_id',$_GET['confirmorder_id']);
		$stmt_update->execute();
		
		header("Location: orderdetails.php");
	}

?>

<?php
	if(isset($_GET['declineorder_id']))
   {		
		$stmt_update = $DB_con->prepare('UPDATE orderdetails SET status_verify = "declined" WHERE order_id =:order_id');
		$stmt_update->bindParam(':order_id',$_GET['declineorder_id']);
		$stmt_update->execute();
		
		header("Location: orderdetails.php");
	}

?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?php include_once 'aside.php' ?>        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Orders</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Student OrdersDetails</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->					 
             <div class="card">
                            <table class="table">
                              <thead>
                                <tr>
                                 <tr>
						<th><input type="checkbox" id="checkAl"> Select All</th>						
                  <th>Date Ordered</th>
                  <th>Customer Name</th>
				  <th>Item</th>
                  <th>Price</th>
				  <th>Quantity</th>
				  <th>Total</th>
				  <th>Actions</th>
	
                 
                </tr>
              </thead>
              <tbody>
					<?php
//include_once 'dbConfig.php';
//if(isset($_POST['save'])){
//	$checkbox = $_POST['check'];
//	for($i=0;$i<count($checkbox);$i++){
//	$del_id = $checkbox[$i]; 
//	mysqli_query($db,"DELETE FROM users WHERE userid='".$del_id."'");
//	$message = "Data deleted successfully !";
//}
//}
//$result = mysqli_query($db,"SELECT * FROM users");
?>
			  <?php
include("config.php");
$id = $_GET['class_id'];
	$stmt = $DB_con->prepare("select order_id, orderdetails.class_id, order_date,users.user_name, order_name, order_price, order_quantity, order_total,status_verify from orderdetails, users where orderdetails.user_id=users.user_id and orderdetails.class_id='$id' and status_verify='pending' order by order_date desc");
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
		include("dbConfig.php");
		if(isset($_POST['save'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$update_id = $checkbox[$i]; 
	mysqli_query($db,"UPDATE orderdetails SET status_verify = 'confirmed' WHERE order_id ='$update_id'");
	$message = "Data Updated successfully !";
}
}	
			?>
									<?php
$i=0;
?>
                <tr>
				 <form method="post" action="">
                  <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["order_id"]; ?>">
						</td>
                 <td><?php echo $order_date; ?></td>
				 <td><?php echo $user_name; ?></td>
				 <td><?php echo $order_name; ?></td>
				 <td>₦<?php echo $order_price; ?></td>
				 <td><?php echo $order_quantity; ?></td>
				 <td>₦<?php echo $order_total; ?></td>
				 
				 <td>
				
				 
				
				<a class="btn btn-danger" href="?deleteorder_id=<?php echo $row['order_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this item ordered?')">
				  <span class='fa fa-trash'></span>
				  Remove Item Ordered</a>
				<?php
if ($status_verify == "confirmed") {
    echo "Order Confirmed";
} elseif
	($status_verify == "declined") {
    echo "Order Declined";
} else {
    echo '<a class="btn btn-success" href="?confirmorder_id='.$row["order_id"].'" title="click for verification" onclick="return confirm("Are you sure to Verify this item ordered?")">
				  <span class="fa fa-check"></span>
				  Confirm Order</a>
				  <a class="btn btn-danger" href="?declineorder_id='.$row["order_id"].'" title="click for verification" onclick="return confirm("Are you sure to Decline this item ordered?")">
				  <span class="fa fa-check"></span>
				  Decline Order</a>
				  ';
}
?>
				
                  
                  </td>
			
                </tr>
					 <?php
$i++;
?>
               	 <td colspan="8" align="right"><button type="submit" class="btn btn-success" name="save">Confirm Selected</button></td>
              <?php
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		echo "<br />";
		echo "</div>";
	}
	else
	{
		?>
		
			
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
	}
	
?>
			
                              </tbody>
				  </form>
                            </table>
                        </div>
                       

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include_once 'footer.php' ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
	 <script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>

</body>

</html>