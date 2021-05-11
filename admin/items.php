<?php
include 'dbConfig.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Items Uploaded successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
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
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
			
			<!-- Modal -->
                                <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload New Item</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form enctype="multipart/form-data" method="post" action="additems.php">
                   <fieldset>
                            <p>Name of Item:</p>
                            <div class="form-group">
                                <input class="form-control" placeholder="Name of Item" name="item_name" type="text" required>
							</div>
							<p>Price:</p>
                            <div class="form-group">
                                <input id="priceinput" class="form-control" placeholder="Price" name="item_price" type="text" required>
							</div>
							<p>Quantity:</p>
                            <div class="form-group">
                                <input id="priceinput" class="form-control" placeholder="Quantity" name="item_quantity" type="text" required>
							</div>
<!--							<p>Choose Image:</p>-->
<!--							<div class="form-group">-->
<!--                                <input class="btn btn-secondary"  type="file" name="item_image" accept="image/*" required/>-->
<!--							</div>-->
					 </fieldset>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success btn-md" name="item_save">Save</button>
				 <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
				
				   </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
								
								<!-- Modal -->
                                <div class="modal fade" id="Modal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Item Info</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form action="importitem.php" method="post" enctype="multipart/form-data" id="importFrm">
                   <fieldset>
                           <input type="file" name="file" />      
					 </fieldset>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success btn-md" name="importSubmit">Save</button>
				 <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
				   </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
								
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Items Managment</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Item Manager</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
					 &nbsp;&nbsp;<button type="button" class="btn btn-info margin-5 text-white" data-toggle="modal" data-target="#Modal2">
                                    Create Item
                                </button> &nbsp;&nbsp;
                                 <a class="btn btn-success" href="item_template.php"><span class='glyphicon glyphicon-shopping-cart'></span> Download Items Template</a>&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger margin-5 text-white" data-toggle="modal" data-target="#Modal6">
                                    Import Item
                                </button> 
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
             <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
                        <div class="card">
                            <table class="table">
                              <thead>
                                 <tr>
                  <!--<th>Image</th>-->
                  <th>Name of Item</th>
				  <th>Price</th>
				  <th>Date Added</th>
				  <th>Quantity Availabe</th>
                  <th>Actions</th>
				   
                 
                </tr>
              </thead>
              <tbody>
			  <?php
include("config.php");
	$stmt = $DB_con->prepare('SELECT * FROM items');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
            <?php
            $id = $item_id;
 include("config.php");
		  $stmt_edit = $DB_con->prepare("select sum(order_quantity) as total from orderdetails where order_id='$id' and order_status='Ordered' and status_verify='confirmed'");
		$stmt_edit->execute(array(':item_id'=>$item_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		
		?>
                <tr>
<!--                  <td>-->
<!--				<center> <img src="item_images/<?php echo $item_image; ?>" class="img img-rounded"  width="50" height="50" /></center>-->
<!--				 </td>-->
                 <td><?php echo $item_name; ?></td>
				 <td>₦ <?php echo $item_price; ?></td>
				 <td><?php echo $item_date; ?></td>
				 <td><?php echo $item_quantity-$total; ?></td>
				 
				 <td>
				
				 
				
				 <a class="btn btn-info" href="edititem.php?edit_id=<?php echo $row['item_id']; ?>" title="click for edit" onclick="return confirm('Are you sure edit this item?')"><span class='glyphicon glyphicon-pencil'></span> Edit Item</a> 
				
                  <a class="btn btn-danger" href="?delete_id=<?php echo $row['item_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this item?')"><span class='glyphicon glyphicon-trash'></span> Remove Item</a>
				
                  </td>
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