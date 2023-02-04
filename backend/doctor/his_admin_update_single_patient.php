<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_patient']))
		{
            date_default_timezone_set('Asia/Manila');
            $date = date("Y/m/d h:i:sa");
			$pat_number=$_GET['pat_id'];
            $pat_diagnosis = $_POST['pat_diagnosis'];
            $pat_instruction = $_POST['pat_instruction'];
            $nurse_instruction = $_POST['nurse_instruction'];

            //sql to insert captured values
			$query="UPDATE  his_patients SET pat_diagnosis ='$pat_diagnosis', pat_instruction='$pat_instruction', nurse_instruction = '$nurse_instruction' WHERE pat_id ='$pat_number'";
			$stmt = $mysqli->prepare($query);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
                $id = $_SESSION['ad_id'];
                if ($pat_diagnosis != $_POST['pat_diagnosis']) {
                    $changes = 'Change patient diagnosis<br>From '.$_POST['pat_diagnosis'].'<br> To '.$pat_diagnosis.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
				$success = "Patient Details Updated";
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                            <li class="breadcrumb-item active">Manage Patients</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Update Patient Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <!-- Form row -->
                        <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                        <?php
                            $pat_number=$_GET['pat_id'];
                            $ret="SELECT  * FROM his_patients WHERE pat_id=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('i',$pat_number);
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
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <input type="hidden" name="fname" value="<?php echo $row->pat_fname;?>">
                                            <input type="hidden" name="mname" value="<?php echo $row->mname;?>">
                                            <input type="hidden" name="lname" value="<?php echo $row->pat_lname;?>">
                                            <input type="hidden" name="dob" value="<?php echo $row->pat_dob;?>">
                                            <input type="hidden" name="age" value="<?php echo $row->pat_age;?>">
                                            <input type="hidden" name="address" value="<?php echo $row->pat_addr;?>">
                                            <input type="hidden" name="ward" value="<?php echo $row->wardnumber;?>">
                                            <input type="hidden" name="bed" value="<?php echo $row->bednumber;?>">
                                            <input type="hidden" name="ailment" value="<?php echo $row->pat_ailment;?>">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->pat_fname;?>" name="pat_fname" class="form-control" id="inputEmail4" placeholder="Patient's First Name" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Middle Name</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_mname;?>" name="pat_mname" class="form-control"  id="inputPassword4" placeholder="Patient`s Middle Name" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_lname;?>" name="pat_lname" class="form-control"  id="inputPassword4" placeholder="Patient`s Last Name" readonly>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                    <input type="text" required="required" value="<?php echo $row->pat_dob;?>" name="pat_dob" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY" readonly>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_age;?>" name="pat_age" class="form-control"  id="inputPassword4" placeholder="Patient`s Age" readonly>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputAddress" class="col-form-label">Sex</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_sex;?>" class="form-control" name="pat_sex" id="inputAddress" placeholder="Patient's Gender" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress" class="col-form-label">Address</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_addr;?>" class="form-control" name="pat_addr" id="inputAddress" placeholder="Patient's Addresss" readonly>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="pat_diagnosis" class="col-form-label">Diagnosis</label>
                                                    <textarea required="required" name="pat_diagnosis" class="form-control" id="pat_diagnosis" rows="10" cols="23" style="resize:none" placeholder="Diagnosis for patient"><?php echo $row->pat_diagnosis;?></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="nurse_instruction" class="col-form-label">Nurse Instruction</label>
                                                    <textarea required="required" name="nurse_instruction" class="form-control" id="nurse_instruction" rows="10" cols="23" style="resize:none" placeholder="Instruction for nurse"><?php echo $row->nurse_instruction;?></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="pat_instruction" class="col-form-label">Patient Instruction</label>
                                                    <textarea required="required" name="pat_instruction" class="form-control" id="pat_instruction" rows="10" cols="23" style="resize:none" placeholder="Instruction for patient"><?php echo $row->pat_instruction;?></textarea>
                                                </div>
                                            </div>

                                            <button type="submit" name="update_patient" class="ladda-button btn btn-success" data-style="expand-right">Update Patient</button>

                                        </form>
                                        <!--End Patient Form-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <?php  }?>
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
        
    </body>

</html>