<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_patient']))
		{
            date_default_timezone_set('Asia/Manila');
            $date = date("Y/m/d h:i:sa");
			$pat_fname=$_POST['pat_fname'];
			$pat_lname=$_POST['pat_lname'];
			$pat_number=$_GET['pat_id'];
            $pat_phone=$_POST['pat_phone'];
            $pat_type=$_POST['pat_type'];
            $pat_addr=$_POST['pat_addr'];
            $pat_age = $_POST['pat_age'];
            $pat_dob = $_POST['pat_dob'];
            $pat_ailment = $_POST['pat_ailment'];
            $pat_ward = $_POST['pat_ward'];
            $pat_bed = $_POST['pat_bed'];
            //sql to insert captured values
			$query="UPDATE  his_patients  SET pat_fname='$pat_fname', pat_lname='$pat_lname', pat_age='$pat_age', pat_dob='$pat_dob',  pat_phone='$pat_phone', pat_type='$pat_type', pat_addr='$pat_addr', pat_ailment='$pat_ailment', wardnumber = '$pat_ward', bednumber = '$pat_bed' WHERE pat_id ='$pat_number'";
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
                
                if ($pat_fname != $_POST['fname']) {
                    $changes = 'Change patient Firstname<br> From '.$_POST['fname'].'<br> To '.$pat_fname.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_lname != $_POST['lname']) {
                    $changes = 'Change patient Lastname<br> From '.$_POST['lname'].'<br> To '.$pat_lname.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_dob != $_POST['dob']) {
                    $changes = 'Change patient Date of Birth<br> From '.$_POST['dob'].'<br> To '.$pat_dob.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_age != $_POST['age']) {
                    $changes = 'Change patient Age<br>From '.$_POST['age'].'<br> To '.$pat_age.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_addr != $_POST['address']) {
                    $changes = 'Change patient address<br>From '.$_POST['address'].'<br> To '.$pat_addr.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_ward != $_POST['ward']) {
                    $changes = 'Change patient Ward Number<br> From '.$_POST['ward'].'<br> To '.$pat_ward.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_bed != $_POST['bed']) {
                    $changes = 'Change patient Bed Number<br> From '.$_POST['bed'].'<br> To '.$pat_bed.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_phone != $_POST['mobile']) {
                    $changes = 'Change patient Bed phone number<br>From '.$_POST['mobile'].'<br> To '.$pat_phone.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_ailment != $_POST['ailment']) {
                    $changes = 'Change patient Bed ailment<br>From '.$_POST['ailment'].'<br> To '.$pat_ailment.'';
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
                                        <h4 class="header-title">Fill all fields</h4>
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <input type="hidden" name="fname" value="<?php echo $row->pat_fname;?>">
                                            <input type="hidden" name="lname" value="<?php echo $row->pat_lname;?>">
                                            <input type="hidden" name="dob" value="<?php echo $row->pat_dob;?>">
                                            <input type="hidden" name="age" value="<?php echo $row->pat_age;?>">
                                            <input type="hidden" name="address" value="<?php echo $row->pat_addr;?>">
                                            <input type="hidden" name="ward" value="<?php echo $row->wardnumber;?>">
                                            <input type="hidden" name="bed" value="<?php echo $row->bednumber;?>">
                                            <input type="hidden" name="mobile" value="<?php echo $row->pat_phone;?>">
                                            <input type="hidden" name="ailment" value="<?php echo $row->pat_ailment;?>">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->pat_fname;?>" name="pat_fname" class="form-control" id="inputEmail4" placeholder="Patient's First Name">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Last Name</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_lname;?>" name="pat_lname" class="form-control"  id="inputPassword4" placeholder="Patient`s Last Name">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Date Of Birth</label>
                                                    <input type="text" required="required" value="<?php echo $row->pat_dob;?>" name="pat_dob" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_age;?>" name="pat_age" class="form-control"  id="inputPassword4" placeholder="Patient`s Age">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress" class="col-form-label">Address</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_addr;?>" class="form-control" name="pat_addr" id="inputAddress" placeholder="Patient's Addresss">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputWard" class="col-form-label">Ward Number</label>
                                                    <input type="number" value="<?php echo $row->wardnumber;?>" class="form-control" name="pat_ward" id="inputWard" placeholder="Patient's Ward Number">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="inputBed" class="col-form-label">Bed Number</label>
                                                    <input type="number" value="<?php echo $row->bednumber;?>" class="form-control" name="pat_bed" id="inputBed" placeholder="Patient's Bed number">
                                                </div>
                                            </div>
                                            
                                            

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Mobile Number</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_phone;?>" name="pat_phone" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Ailment</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_ailment;?>" name="pat_ailment" class="form-control" id="inputCity">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Patient's Type</label>
                                                    <select id="inputState" required="required" name="pat_type" class="form-control">
                                                        <option>choose</option>
                                                        <option>InPatient</option>
                                                        <option>OutPatient</option>
                                                    </select>
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