<aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="home.php?id=1" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Home</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cart_items.php" aria-expanded="false"><i class="mdi mdi-cart-outline"></i><span class="hide-menu">Shopping Cart List</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="orders.php" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Ordered Items</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="view_purchased.php" aria-expanded="false"><i class="mdi mdi-cart-off"></i><span class="hide-menu">Previous Ordered Items</span></a></li>
                        <li class="sidebar-item"> <a data-toggle="modal" data-target="#Modal2" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><i class="mdi mdi-cash"></i><span class="hide-menu">Redeem Voucher</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
<!-- Modal -->
                                <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Redeem Voucher</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form enctype="multipart/form-data" method="post" action="verify.php?id=<?php echo $user_id; ?>">
                   <fieldset>
                            <p>Voucher:</p>
                            <div class="form-group">
                                <input class="form-control" placeholder="Voucher" name="vouc" type="text" required>
							</div>
					 </fieldset>
              </div>
              <div class="modal-footer">
                <button class="btn btn-success btn-md" name="submit">Redeem</button>
				 <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
				
				   </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->