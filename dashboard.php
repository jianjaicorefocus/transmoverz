<!doctype html>
<html lang="en">

    

<?php include 'include/head.php';?>

    <body>

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <?php include 'include/inside.php';?>

            <!-- ========== Left Sidebar Start ========== -->
           <?php include 'include/sidebar.php';?>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                   

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="list_zone.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Delivery Zones</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from zones")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="fa fa-motorcycle font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="list_cat.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Category</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_category")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center ">
                                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-primary">
                                                                <i class="fa fa-list font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="list_coupon.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Coupon</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_scoupon")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-info">
                                                                <i class="fa fa-percent font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="list_code.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Country Code</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_code")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-info">
                                                                <i class="fa fa-flag font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="list_vehi.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Vehicle Type</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_vehicle")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-info">
                                                                <i class="fa fa-motorcycle font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="list_rider.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Delivery Boy</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_rider")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-info">
                                                                <i class="fa fa-motorcycle font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="userlist.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total User List</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_user")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-info">
                                                                <i class="fa fa-users font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="paymentlist.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Payment Gateway</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_payment_list")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-info">
                                                                <i class="fas fa-bullseye font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="pending.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Pending Order</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_order where o_status='Pending'")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-info">
                                                                <i class="fas fa-shopping-cart font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="process.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Process Order</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_order where o_status='Processing'")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-info">
                                                                <i class="fas fa-cart-arrow-down  font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="onroute.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total On Route Order</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_order where o_status='On Route'")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-warning mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-warning">
                                                                <i class="fas fa-route font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="complete.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Complete Order</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_order where o_status='Completed'")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-success mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-success">
                                                                <i class="fas fa-check font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
										<a href="cancle.php">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Cancelled Order</p>
                                                        <h4 class="mb-0"><?php echo $lundry->query("select * from tbl_order where o_status='Cancelled'")->num_rows;?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-danger mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-danger">
                                                                <i class="fa fa-times font-size-24"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</a>
                                        </div>
                                    </div>
									
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Sales</p>
                                                        <h4 class="mb-0"><?php $sale = $lundry->query("select sum(o_total) as total_sale from tbl_order where o_status='Completed'")->fetch_assoc(); 
										$bs = 0;
                 if($sale['total_sale'] == ''){echo $bs.' '.$set['currency'];}else {echo number_format((float)$sale['total_sale'], 2, '.', '').' '.$set['currency'];}?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-info font-size-24">
                                                                <?php echo $set['currency'];?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
									
									<div class="col-md-2">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <p class="text-muted fw-medium">Total Earning(Rider)</p>
                                                        <h4 class="mb-0"><?php $sales  = $lundry->query("select sum(o_total * dcommission/100) as commission from tbl_order where o_status='completed'")->fetch_assoc(); if($sales['commission'] == ''){echo $bs.' '.$set['currency'];}else {echo  number_format((float)($sales['commission']), 2, '.', '').' '.$set['currency']; }?></h4>
                                                    </div>

                                                    <div class="flex-shrink-0 align-self-center">
                                                        <div class="avatar-sm rounded-circle bg-info mini-stat-icon">
                                                            <span class="avatar-title rounded-circle bg-info font-size-24">
                                                                <?php echo $set['currency'];?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									
                                </div>
                                <!-- end row -->

                                
                            </div>
                        </div>
                        <!-- end row -->

                        <!-- end row -->

                        
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Transaction Modal -->
              
                
               
            </div>
            <!-- end main content-->

        </div>
        
        

       <?php include 'include/lundryfoot.php';?>
    </body>



</html>