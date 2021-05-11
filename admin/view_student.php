<?php
include 'dbConfig.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'General Class deduction successful.';
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

if(!empty($_GET['status1'])){
    switch($_GET['status1']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Student Upload successful.';
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
<?php

	require_once 'config.php';
	
	if(isset($_GET['deletestudent_id']))
	{
		
		
		
	
		$stmt_delete = $DB_con->prepare('DELETE FROM users WHERE user_id =:user_id');
		$stmt_delete->bindParam(':user_id',$_GET['deletestudent_id']);
		$stmt_delete->execute();
		
		header("Location: student.php");
	}
@@$id = $_GET['class_id'];
@@$user_class = $_GET['class_name']; 
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
                                <div class="modal fade" id="Modal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Student Info</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form action="importdeduction.php?class_id=<?php echo $id;?>&class_name=<?php echo $user_class;?>" method="post" enctype="multipart/form-data" id="importFrm">
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
                                
                                <!-- Modal -->
                                <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Student Info</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form enctype="multipart/form-data" method="post" action="save_student.php">
                   <fieldset>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password" placeholder="Password Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="fname" placeholder="First Name Here">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="lname" placeholder="Last Name Here">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Class</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="class" placeholder="Class">
                                        </div>
                                    </div>
					 </fieldset>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success btn-md" name="student_save">Save</button>
				 <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
				
				   </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
<!-- Modal -->
                                <div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Student Info</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form action="importData.php?class_id=<?php echo $id;?>&class_name=<?php echo $user_class;?>" method="post" enctype="multipart/form-data" id="importFrm">
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
                        <h4 class="page-title">User Manager</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User Management</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                     <button type="button" class="btn btn-info margin-5 text-white" data-toggle="modal" data-target="#Modal1">
                                    Add Students
                                </button>  &nbsp;&nbsp;
                                <a class="btn btn-success" href="student_template.php?class_id=<?php echo $id; ?>"><span class='glyphicon glyphicon-shopping-cart'></span> Download Student Template</a>&nbsp;&nbsp;
                                <button type="button" class="btn btn-danger margin-5 text-white" data-toggle="modal" data-target="#Modal3">
                                    Import Student
                                </button> &nbsp;&nbsp;
                    <a class="btn btn-success" href="deduct_template.php?class_id=<?php echo $id; ?>"><span class='glyphicon glyphicon-shopping-cart'></span> Download General Reduction Template</a>
                     &nbsp;&nbsp;<button type="button" class="btn btn-info margin-5 text-white" data-toggle="modal" data-id="" data-target="#Modal7">
                            General Class Deduction
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
                  <th>Name</th>
                 <th>Student Email</th>
				  <th>Class</th>
                   <th>Gender</th>
                  <th>Roll No</th>
                  <th>Date</th>                    
                  <th>Actions</th>
                                                </tr>
                              </thead>
                              <tbody>
     <?php
include("config.php");
	$stmt = $DB_con->prepare("SELECT * FROM users WHERE class_id='$id' ORDER BY user_name");
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
			
			?>
                <tr>
				 <td><?php echo $user_name; ?></td>
                    <td><?php echo $user_email; ?></td>
                    <td><?php echo $user_class; ?></td>
                    <td><?php echo $user_gender; ?></td>
                    <td><?php echo $user_rollno; ?></td>
                    <td><?php echo $date; ?></td>
				 <td>
				 <a class="btn btn-success" href="view_orders.php?view_id=<?php echo $row['user_id']; ?>&class_id=<?php echo $id; ?>&class_name=<?php echo $user_class; ?>"><span class='glyphicon glyphicon-shopping-cart'></span> View Orders</a> 
				  <a class="btn btn-warning" href="?order_id=<?php echo $row['user_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to reset the customer items ordered?')">
				  <span class='glyphicon glyphicon-ban-circle'></span>
				  Reset Order</a>
				 <a class="btn btn-primary" href="previous_orders.php?previous_id=<?php echo $row['user_id']; ?>&class_id=<?php echo $id; ?>&class_name=<?php echo $user_class; ?>"><span class='glyphicon glyphicon-eye-open'></span> Previous Items Ordered</a> 
		
                  <a class="btn btn-warning" href="deduct.php?deduct_id=<?php echo $row['user_id']; ?>& deduct_name=<?php echo $row['user_name']; ?>" title="click to deduct" data-userid="<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure to deduct from this customer?')">
				  <span class='glyphicon glyphicon-trash'></span>
				  Deduct from Account</a>
                   <a class="btn btn-danger" href="?deletestudent_id=<?php echo $row['user_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this customer?')">
				  <span class='glyphicon glyphicon-trash'></span>
				  Remove Account</a>
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