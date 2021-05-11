<?php

	require_once 'config.php';
	
	if(isset($_GET['deletestudent_id']))
	{
		
		
		
	
		$stmt_delete = $DB_con->prepare('DELETE FROM users WHERE user_id =:user_id');
		$stmt_delete->bindParam(':user_id',$_GET['deletestudent_id']);
		$stmt_delete->execute();
		
		header("Location: student.php");
	}

?>

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

<!-- Modal -->
                                <div class="modal fade" id="Modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Voucher Generation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form enctype="multipart/form-data" method="post" action="save_voucher.php">
                   <fieldset>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="amount" placeholder="Amount">
                                        </div>
                                    </div>
					 </fieldset>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success btn-md" name="voucher_save">Save</button>
				 <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
				
				   </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->


            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Voucher Manager</h4>
                               <button type="button" class="btn btn-warning margin-5 text-white" data-toggle="modal" data-target="#Modal4">
                                    Generate Voucher
                                </button>
                        
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Voucher Management</li>
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
                                 <th>Voucher Pin</th>
                                  <th>Amount</th>
                                  <th>Status</th>
                                                </tr>
                              </thead>
                              <tbody>
     <?php
include("config.php");
	$stmt = $DB_con->prepare('SELECT * FROM voucher');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
			
			?>
                <tr>
                  
                 <td><?php echo $voucher; ?></td>
				 <td><?php echo $amount; ?></td>
                     

				 <td>

                    					<?php
$t = $status;

if ($t < "1") {
    echo "Available";
} else {
    echo "Voucher has been used";
}
?></td>
				 
<!--
				 <td>
				
				 
				
				 <a class="btn btn-success" href="view_orders.php?view_id=<?php echo $row['user_id']; ?>"><span class='glyphicon glyphicon-shopping-cart'></span> View Orders</a> 
				  <a class="btn btn-warning" href="?order_id=<?php echo $row['user_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to reset the customer items ordered?')">
				  <span class='glyphicon glyphicon-ban-circle'></span>
				  Reset Order</a>
				 <a class="btn btn-primary" href="previous_orders.php?previous_id=<?php echo $row['user_id']; ?>"><span class='glyphicon glyphicon-eye-open'></span> Previous Items Ordered</a> 
				
				
                  <a class="btn btn-danger" href="?deletestudent_id=<?php echo $row['user_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this customer?')">
				  <span class='glyphicon glyphicon-trash'></span>
				  Remove Account</a>
				
                  </td>
-->
                </tr>
               
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