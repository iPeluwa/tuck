<?php include_once 'header.php' ?>
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
                        <h4 class="page-title">Ordered Items</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Ordered Items</li>
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
                                 <th>Item</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Total</th>
								  <th>Status</th>
								   <th>Action</th>
                                                </tr>
                              </thead>
                              <tbody>
                               <?php
include("config.php");
 
	$stmt = $DB_con->prepare("SELECT * FROM orderdetails where order_status='Ordered' and user_id='$user_id'");
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
			
			?>
			<?php
	if(isset($_GET['confirmdelivery_id']))
   {		
		$stmt_update = $DB_con->prepare('UPDATE orderdetails SET delivery_status = "confirmed" WHERE order_id =:order_id');
		$stmt_update->bindParam(':order_id',$_GET['confirmdelivery_id']);
		$stmt_update->execute();
		
		@@header("Location: orders.php");
	}

?>

<?php
	if(isset($_GET['declinedelivery_id']))
   {		
		$stmt_update = $DB_con->prepare('UPDATE orderdetails SET delivery_status = "declined" WHERE order_id =:order_id');
		$stmt_update->bindParam(':order_id',$_GET['declinedelivery_id']);
		$stmt_update->execute();
		
		header("Location: orders.php");
	}

?>
                <tr>
                  
                 <td><?php echo $order_name; ?></td>
				 <td>??? <?php echo $order_price; ?> </td>
				 <td><?php echo $order_quantity; ?></td>
				 <td>??? <?php echo $order_total; ?> </td>
				 <td><?php echo $status_verify; ?> </td>
				 <td><?php
if ($status_verify && $delivery_status == "confirmed") {
    echo "Delivery Confirmed";
 } elseif
	($status_verify == "declined") {
    echo "No Action Required";
	} elseif
	($status_verify == "pending") {
    echo "No Action Required";
} else {
    echo  '
				 <a class="btn btn-success" href="?confirmdelivery_id='.$row["order_id"].'" title="click for verification" onclick="return confirm("Are you sure to Verify this item ordered?")">
				  <span class="fa fa-check"></span>
				  Confirm Delivery</a>
				  <a class="btn btn-danger" href="?declinedelivery_id='.$row["order_id"].'" title="click for verification" onclick="return confirm("Are you sure to Decline this item ordered?")">
				  <span class="fa fa-check"></span>
				  Decline Delivery</a>';
}
?>
				 
				 </td>
				 
				 
                </tr>

               
              <?php
		}
		 include("config.php");
		  $stmt_edit = $DB_con->prepare("select sum(order_total) as totalx from orderdetails where user_id=:user_id and order_status='Ordered' and status_verify='confirmed'");
		$stmt_edit->execute(array(':user_id'=>$user_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		echo "<tr>";
		echo "<td colspan='5' align='right'>Total Price Ordered (Confirmed Order Only):";
		echo "</td>";
		
		echo "<td>??? ".$totalx;
		echo "</td>";
		
		
		
		echo "</tr>";
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
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Item Found ...
            </div>
        </div>
        <?php
	}
	
?>
			
                              </tbody>
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