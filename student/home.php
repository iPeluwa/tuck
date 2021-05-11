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
                        <h4 class="page-title">Available Items</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
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
                <div class="row el-element-overlay">
                    <?php
$query1=mysql_connect("localhost","root","");
mysql_select_db("tuckshop",$query1);

$start=0;
$limit=8;

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}

$query=mysql_query("select * from items LIMIT $start, $limit");


while($query2=mysql_fetch_array($query))
{
	
	echo "<div class='col-lg-3 col-md-6'>
                        <div class='card'>
                            <div class='el-card-item'>
                                <div class='el-card-avatar el-overlay-1'><img style='width: 300px; height: 300px; align-content: centers' src='../assets/images/big/auth-bg.jpg'  alt='user' />
                                    <div class='el-overlay'>
                                        <ul class='list-style-none el-info'>
                                            <li class='el-item'><a class='btn default btn-outline el-link' href='add_to_cart.php?cart=".$query2['item_id']."'><i class='mdi mdi-cart-plus'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class='el-card-content'>
                                    <h4 class='m-b-0'>".$query2['item_name']."</h4> <span class='text-muted'>Price: ₦ ".$query2['item_price']."</span>
                                </div>
                            </div>
                        </div>
                    </div>";
			
	
}

echo "<div class='container'>";
echo "</div>";




$rows=mysql_num_rows(mysql_query("select * from items"));
$total=ceil($rows/$limit);
echo "<br /><ul class='pager'>";
if($id>1)
{
	echo " <a class='btn btn-outline-info' href='?id=".($id-1)."'>Previous Page</a> ";
}
if($id!=$total)
{
	echo "<a class='btn btn-outline-info' href='?id=".($id+1)."'>Next Page</a> ";
}
echo "</ul>";


echo "<center><ul class='pagination pagination-lg'>";
		for($i=1;$i<=$total;$i++)
		{
			if($i==$id) { echo "  <button type='button' class='btn btn-outline-primary'>".$i."</button>"; }
			
	
			
			else { echo "<a class='btn btn-outline-warning'  href='?id=".$i."'>".$i."</a>"; }
		}
echo "</ul></center>";
?>
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
    <script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="../assets/libs/magnific-popup/meg.init.js"></script>
</body>

</html>