<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['assign_dept']))
		{
            $ad_id = $_GET['ad_id'];
            $doc_dept = $_POST['doc_dept'];
            //sql to insert captured values
			$query="UPDATE his_admin SET status=? WHERE ad_id = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ss', $doc_dept, $ad_id);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Employee Assigned Department";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">
    
    <!--Head-->
    <?php include('assets/inc/head.php');?>
    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include("assets/inc/nav.php");?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                                            <li class="breadcrumb-item active">Assign Department</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Assign Department</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <?php
                            $ret="SELECT  * FROM his_admin WHERE ad_id =?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$_GET['ad_id'] );
                            $stmt->execute() ;//ok
                            $res=$stmt->get_result();
                            //$cnt=1;
                            while($row=$res->fetch_object())
                            {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" readonly value="<?php echo $row->ad_fname;?>" name="doc_fname" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" readonly value="<?php echo $row->ad_lname;?>" name="doc_lname" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Email</label>
                                                <input required="required" type="email" readonly value="<?php echo $row->ad_email;?>" class="form-control" name="doc_email" id="inputAddress">
                                            </div>
                                            
                                            <div class="form-group">
                                                    <label for="inputState" class="col-form-label">Departments</label>
                                                    <select id="inputState" required="required" name="doc_dept" class="form-control">
                                                        <option>Choose</option>
                                                        <option value="2">Doctor</option>
                                                        <option value="3">Nurse</option>
                                                        <option value="4">Medical Records</option>
                                                        <option value="5">Laboratory</option>
                                                        <option value="6">Front Desk</option>
                                                    </select>
                                            </div>                                         

                                            <button type="submit" name="assign_dept" class="ladda-button btn btn-success" data-style="expand-right">Assign Department</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        <?php }?>

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <?php include('assets/inc/footer.php');?>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

       
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>

        <!-- Loading buttons js -->
        <script src="assets/libs/ladda/spin.js"></script>
        <script src="assets/libs/ladda/ladda.js"></script>

        <!-- Buttons init js-->
        <script src="assets/js/pages/loading-btn.init.js"></script>
        
    </body>

</html>