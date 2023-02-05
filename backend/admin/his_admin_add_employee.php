<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_employee']))
		{
			$doc_fname=$_POST['doc_fname'];
			$doc_lname=$_POST['doc_lname'];
			$doc_number=$_POST['doc_number'];
            $doc_email=$_POST['doc_email'];
            $doc_pwd=sha1(md5($_POST['doc_pwd']));

            // if(isset($_POST['doc_dpic'])){
                $ad_dpic=$_FILES["doc_dpic"]["name"];
                move_uploaded_file($_FILES["doc_dpic"]["tmp_name"],"assets/images/users/".$_FILES["doc_dpic"]["name"]);
            // }

			$selectedValue = $_POST['selectedValue'];

            $query="INSERT INTO his_admin (ad_fname, ad_lname, ad_email, ad_pwd, ad_dpic, status) values('$doc_fname','$doc_lname','$doc_email','$doc_pwd', '$ad_dpic', '$selectedValue')";
            $stmt = $mysqli->prepare($query);
            $stmt->execute();

			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Employee Details Added";
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
                                            <li class="breadcrumb-item active">Add Employee</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Employee Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Employee Form-->
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" style="text-transform: capitalize;" required="required" name="doc_fname" class="form-control" id="inputEmail4" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" style="text-transform: capitalize;" name="doc_lname" class="form-control"  id="inputPassword4">
                                                </div>
                                            </div>

                                                <div class="form-group col-md-2" style="display:none">
                                                    <?php 
                                                        $length = 5;    
                                                        $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                    <label for="inputZip" class="col-form-label">Doctor Number</label>
                                                    <input type="text" style="text-transform: capitalize;" name="doc_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
                                                </div>
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="inputAddress" class="col-form-label">Email</label>
                                                    <input required="required" style="text-transform: capitalize;" type="email" class="form-control" name="doc_email" id="inputAddress">
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                    <label for="inputCity" class="col-form-label">Password</label>
                                                    <input required="required" style="text-transform: capitalize;" type="password" name="doc_pwd" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="dept_id" class="col-form-label">Department</label>
                                                    <select required="required" name="selectedValue" class="form-control" id="dept_id">
                                                        <?php
                                                            $query = "SELECT id, department FROM tbluser";
                                                            $stmt = $mysqli->prepare($query);
                                                            $stmt->execute();
                                                            $result = $stmt->get_result();
                                                            
                                                            while ($row = $result->fetch_assoc()) {
                                                            echo "<option value=". $row["id"] .">" . $row["department"] . "</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="doc_dpic" class="col-form-label">Profile Picture</label>
                                                    <input required="required"  type="file" name="doc_dpic" class="btn btn-success form-control"  id="doc_dpic">
                                                </div>
                                            </div>

                                            <button type="submit" name="add_employee" class="ladda-button btn btn-success" data-style="expand-right">Add Employee</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

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

        <script>
            $("#dept_id").change(function() {
                const selectedValue = $(this).val();
                $.ajax({
                type: 'POST',
                data: { selectedValue: selectedValue },
                success: function(response) {
                    console.log(response);
                }
                });
            });
        </script>
        
    </body>

</html>