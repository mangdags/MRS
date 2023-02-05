<!--Server side code to handle  Patient Registration-->
<?php
    session_start();
    include('assets/inc/config.php');
        if(isset($_POST['add_patient']))
        {

            date_default_timezone_set('Asia/Manila');
            // $date = date("Y/m/d h:i:sa");
            $date = $_POST['date_time_registration'];
            $pat_fname = $_POST['pat_fname'];
            $pat_lname = $_POST['pat_lname'];
            $pat_number = $_POST['pat_number'];
            $pat_phone = $_POST['pat_phone'];
            $pat_addr = $_POST['pat_addr'];
            $pat_age = $_POST['pat_age'];
            $pat_dob = $_POST['pat_dob'];
            $pat_mname = $_POST['pat_mname'];
            $pat_sex = $_POST['pat_sex'];
            $pat_civil_status = $_POST['pat_civil_status'];
            $pat_nationality = $_POST['pat_nationality'];
            $pat_employer = $_POST['pat_employer'];
            $pat_employer_mobile = $_POST['pat_employer_mobile'];
            $notified_authority = $_POST['notified_authority'];
            $brought_by = $_POST['brought_by'];
            $brought_by_mobile = $_POST['brought_by_mobile'];

            // $query = "INSERT INTO his_patients (pat_fname, pat_lname, pat_dob, pat_age, pat_number, pat_addr, wardnumber, bednumber, pat_phone, pat_date_joined, pat_discharge_status, status, pat_mname, pat_sex, pat_civil_status, pat_nationality, pat_employer, pat_employer_mobile, notified_authority, brought_by, brought_by_mobile)
            // VALUES ('$pat_fname', '$pat_lname', '$pat_dob', '$pat_age', '$pat_number', '$pat_addr', '', '', '$pat_phone', '$date', '', '1', '$pat_mname', '$pat_sex', '$pat_civil_status', '$pat_nationality', '$pat_employer', '$pat_employer_mobile', '$notified_authority', '$brought_by', '$brought_by_mobile')";

            $query = "INSERT INTO his_patients (pat_fname, pat_lname, pat_dob, pat_age, pat_number, pat_addr, pat_ward, pat_bed, pat_phone, pat_type, pat_date_joined, pat_ailment, pat_discharge_status, status, pat_mname, pat_sex, pat_civil_status, pat_nationality, pat_employer, pat_employer_mobile, notified_authority, brought_by, brought_by_mobile, condition_arrival, pat_temp, temp_method, pat_pulse, pat_bp, pat_cardiac_rate, pat_resp_rate, pat_weight, pat_curr_medication, pat_physical_findings, pat_diagnosis, plan, nurse_note, date_time_disposition, disposition, condition_discharge, attending_doctor, nurse_instruction, pat_instruction)
            VALUES ('$pat_fname', '$pat_lname', '$pat_dob', '$pat_age', '$pat_number', '$pat_addr', DEFAULT, DEFAULT, '$pat_phone', DEFAULT, '$date', DEFAULT, DEFAULT, '1', '$pat_mname', '$pat_sex', '$pat_civil_status', '$pat_nationality', '$pat_employer', '$pat_employer_mobile', '$notified_authority', '$brought_by', '$brought_by_mobile', DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT)";
            
            $stmt = $mysqli->prepare($query);
            $stmt->execute();

            $value = '0';

            $query="INSERT INTO his_vitals (vit_number, vit_pat_number, vit_bodytemp, vit_heartpulse, vit_resprate, vit_bloodpress) VALUES(?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssss', $value, $pat_number, $value, $value, $value, $value);
            $stmt->execute();

            /*
            *Use Sweet Alerts Instead Of Javascript Alerts
            *echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
            */ 
            //declare a varible which will be passed to alert function
            if($stmt)
            {
                $id = $_SESSION['ad_id'];
                $name = $pat_fname . ' '.$pat_lname;
                $query1 = "INSERT INTO his_audit(changes, user_id, date) VALUES('Add patient <br>Name: $name','$id','$date')";
                $stmt1 = $mysqli->prepare($query1);
                $stmt1->execute();
                $success = "Patient Details Added";
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
                                            <li class="breadcrumb-item active">Add Patient</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Patient Details</h4>
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
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="pat_fname" class="col-form-label">First Name</label>
                                                    <input type="text" style="text-transform: capitalize;" required="required" name="pat_fname" class="form-control" id="pat_fname" placeholder="Patient's First Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="pat_mname" class="col-form-label">Middle Name</label>
                                                    <input type="text" style="text-transform: capitalize;" required="required" name="pat_mname" class="form-control" id="pat_mname" placeholder="Patient's Middle Name">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="pat_lname" class="col-form-label">Last Name</label>
                                                    <input required="required" style="text-transform: capitalize;" type="text" name="pat_lname" class="form-control"  id="pat_lname" placeholder="Patient`s Last Name">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="pat_dob" class="col-form-label">Date Of Birth</label>
                                                    <input type="date" required="required" name="pat_dob" class="form-control" id="pat_dob" placeholder="MM/DD/YYYY">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="pat_age" class="col-form-label">Age</label>
                                                    <input required="required" type="text" name="pat_age" class="form-control"  id="pat_age" placeholder="Patient`s Age" readonly>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="pat_sex" class="col-form-label">Sex</label>
                                                    <select name="pat_sex" id="pat_sex" class="form-control" required="required">
                                                        <option>Choose</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2"> 
                                                    <label for="pat_civil_status" class="col-form-label">Civil Status</label>
                                                    <select name="pat_civil_status" id="pat_civil_status" class="form-control" required="required">
                                                        <option>Choose</option>
                                                        <option value="Child">Child</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                        <option value="Widow">Widow</option>
                                                        <option value="Widower">Widower</option>
                                                        <option value="Separated">Separated</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group col-md-3">
                                                    <label for="pat_nationality" class="col-form-label">Nationality</label>
                                                    <input required="required" type="text" name="pat_nationality" class="form-control" id="pat_nationality" style="text-transform: capitalize; " placeholder="Patient's Nationality">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="pat_addr" class="col-form-label">Address</label>
                                                    <input required="required" style="text-transform: capitalize;" type="text" class="form-control" name="pat_addr" id="pat_addr" placeholder="Patient's Addresss">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="pat_phone" class="col-form-label">Mobile Number</label>
                                                    <input required="required" type="tel" name="pat_phone" class="form-control" id="pat_phone" placeholder="Patient's Mobile Number">
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="pat_employer" class="col-form-label">Employer</label>
                                                    <input required="required" type="text" name="pat_employer" class="form-control" id="pat_employer" placeholder="Patient's Employer">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="pat_employer_mobile" class="col-form-label">Mobile Number</label>
                                                    <input required="required" type="tel" name="pat_employer_mobile" class="form-control" id="pat_employer_mobile" placeholder="Employer's Mobile Number">
                                                </div>

                                                <div class="form-group col-md-2"> 
                                                    <label for="notified_authority" class="col-form-label">Notified Proper Authority</label>
                                                    <select name="notified_authority" id="notified_authority" class="form-control" required="required">
                                                        <option>Choose</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                        <option value="Not Applicable">Not Applicable</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="date_time_registration" class="col-form-label">Date and Time of Registration</label>
                                                    <input type="datetime-local" name="date_time_registration" class="form-control" id="date_time_registration" required="required">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="brought_by" class="col-form-label">Brought By</label>
                                                    <select name="brought_by" id="brought_by" class="form-control" required="required">
                                                        <option>Choose</option>
                                                        <option value="Ambulance">Ambulance</option>
                                                        <option value="Family Member">Family Member</option>
                                                        <option value="Friend">Friend</option>
                                                        <option value="Neighbor">Neighbor</option>
                                                        <option value="Police">Police</option>
                                                        <option value="Relatives">Relatives</option>
                                                        <option value="Self">Self</option>
                                                        <option value="Unknown">Unknown</option>
                                                        <option value="Others">Other</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="brought_by_mobile" class="col-form-label">Mobile Number</label>
                                                    <input required="required" type="tel" name="brought_by_mobile" class="form-control" id="brought_by_mobile" placeholder="Mobile Number ">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2" style="display:none">
                                                <?php 
                                                    $length = 5;    
                                                    $patient_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                ?>
                                                <label for="inputZip" class="col-form-label">Patient Number</label>
                                                <input type="text" name="pat_number" value="<?php echo $patient_number;?>" class="form-control" id="inputZip">
                                            </div>

                                            <button type="submit" name="add_patient" class="ladda-button btn btn-primary" data-style="expand-right">Add Patient</button>
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
            document.getElementById("pat_dob").addEventListener("change", function() {
            var dob = new Date(this.value);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var m = today.getMonth() - dob.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            document.getElementById("pat_age").value = age;
            console.log(age);
            });
        </script>
        
    </body>

</html>