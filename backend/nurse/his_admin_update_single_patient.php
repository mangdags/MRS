<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');

		if(isset($_POST['update_patient']))
		{
            $pat_number=$_GET['pat_id'];

            date_default_timezone_set('Asia/Manila');
            $date = date("Y/m/d h:i:sa");
			$pat_type = $_POST['pat_type'];
            $condition_arrival = $_POST['condition_arrival'];
            $pat_temp = $_POST['pat_temp'];
            $temp_method = $_POST['temp_method'];
            $pat_pulse = $_POST['pat_pulse'];
            $pat_bp = $_POST['pat_bp'];
            $pat_cardiac_rate = $_POST['pat_cardiac_rate'];
            $pat_resp_rate = $_POST['pat_resp_rate'];
            $pat_weight = $_POST['pat_weight'];
            $pat_curr_medication = $_POST['pat_curr_medication'];
            $pat_physical_findings = $_POST['pat_physical_findings'];
            $pat_diagnosis = $_POST['pat_diagnosis'];
            $plan = $_POST['plan'];
            $nurse_note = $_POST['nurse_note'];
            $date_time_disposition = $_POST['date_time_disposition'];
            $disposition = $_POST['disposition'];
            $condition_discharge = $_POST['condition_discharge'];
            $pat_ailment = $_POST['pat_ailment'];
            $pat_ward = $_POST['pat_ward'];
            $pat_bed = $_POST['pat_bed'];
            $vit_number = $_POST['vit_number'];

            //sql to insert captured values

			$query = "UPDATE his_patients SET pat_type='$pat_type', condition_arrival='$condition_arrival', pat_temp='$pat_temp', temp_method='$temp_method', pat_pulse='$pat_pulse', pat_bp='$pat_bp', pat_cardiac_rate='$pat_cardiac_rate', pat_resp_rate='$pat_resp_rate', pat_weight='$pat_weight', pat_curr_medication='$pat_curr_medication', pat_physical_findings='$pat_physical_findings', pat_diagnosis='$pat_diagnosis', plan='$plan', nurse_note='$nurse_note', date_time_disposition='$date_time_disposition', disposition='$disposition', condition_discharge='$condition_discharge', pat_ailment='$pat_ailment', pat_ward='$pat_ward', pat_bed='$pat_bed' WHERE pat_id='$pat_number'";

			$stmt = $mysqli->prepare($query);
			$stmt->execute();

            $query="INSERT INTO  his_vitals  (vit_number, vit_pat_number, vit_bodytemp, vit_heartpulse, vit_resprate, vit_bloodpress) VALUES(?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $vit_number, $pat_number, $pat_temp, $pat_pulse, $pat_resp_rate, $pat_bp);
            if($pat_number != $_POST['pat_number']) {
			    $stmt->execute();
            }
            
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
                $id = $_SESSION['ad_id'];
                
                if ($pat_ward != $_POST['pat_ward']) {
                    $changes = 'Change patient Ward Number<br> From '.$_POST['pat_ward'].'<br> To '.$pat_ward.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_bed != $_POST['pat_bed']) {
                    $changes = 'Change patient Bed Number<br> From '.$_POST['pat_bed'].'<br> To '.$pat_bed.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_ailment != $_POST['pat_ailment']) {
                    $changes = 'Change patient Ailment<br>From '.$_POST['pat_ailment'].'<br> To '.$pat_ailment.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($condition_arrival != $_POST['condition_arrival']) {
                    $changes = 'Change patient Condition on Arrival<br> from '.$_POST['condition_arrival'].'<br> to '.$condition_arrival.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_temp != $_POST['pat_temp']) {
                    $changes = 'Change patient Temperature<br> from '.$_POST['pat_temp'].'<br> to '.$pat_temp.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($temp_method != $_POST['temp_method']) {
                    $changes = 'Change Temp Method<br> from '.$_POST['temp_method'].'<br> to '.$temp_method.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_pulse != $_POST['pat_pulse']) {
                    $changes = 'Change patient Pulse<br> from '.$_POST['pat_pulse'].'<br> to '.$pat_pulse.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_bp != $_POST['pat_bp']) {
                    $changes = 'Change patient BP<br>from '.$_POST['pat_bp'].'<br> to '.$pat_bp.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_cardiac_rate != $_POST['pat_cardiac_rate']) {
                    $changes = 'Change patient Cardiac Rate<br>from '.$_POST['pat_cardiac_rate'].'<br> to '.$pat_cardiac_rate.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_resp_rate != $_POST['pat_resp_rate']) {
                    $changes = 'Change patient Respiratory Rate<br>from '.$_POST['pat_resp_rate'].'<br> to '.$pat_resp_rate.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_weight != $_POST['pat_weight']) {
                    $changes = 'Change patient Weight<br>from '.$_POST['pat_weight'].'<br> to '.$pat_weight.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_curr_medication != $_POST['pat_curr_medication']) {
                    $changes = 'Change patient Current Medication<br> from '.$_POST['pat_curr_medication'].'<br> to '.$pat_curr_medication.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_physical_findings != $_POST['pat_physical_findings']) {
                    $changes = 'Change patient Physical Findings<br> from '.$_POST['pat_physical_findings'].'<br> to '.$pat_physical_findings.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_diagnosis != $_POST['pat_diagnosis']) {
                    $changes = 'Change patient Diagnosis<br>from '.$_POST['pat_diagnosis'].'<br> to '.$pat_diagnosis.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($plan != $_POST['plan']) {
                    $changes = 'Change patient Plan<br>from '.$_POST['plan'].'<br> to '.$plan.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }

                if ($nurse_note != $_POST['nurse_note']) {
                    $changes = 'Change patient Nurse Note<br>from '.$_POST['nurse_note'].'<br> to '.$nurse_note.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($date_time_disposition != $_POST['date_time_disposition']) {
                    $changes = 'Change patient Date and Time of Disposition<br> from '.$_POST['date_time_disposition'].'<br> to '.$date_time_disposition.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($disposition != $_POST['disposition']) {
                    $changes = 'Change patient Disposition<br> from '.$_POST['disposition'].'<br> to '.$disposition.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($condition_discharge != $_POST['condition_discharge']) {
                    $changes = 'Change patient Condition Discharge<br>from '.$_POST['condition_discharge'].'<br> to '.$condition_discharge.'';
                    $query = "INSERT INTO his_audit(changes, user_id, date) VALUES('$changes','$id','$date')";
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                }
                if ($pat_type != $_POST['pat_type']) {
                    $changes = 'Change patient Type<br>from '.$_POST['pat_type'].'<br> to '.$pat_type.'';
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
    <body onload="setDefaultValue()">

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
                            
                            while($row=$res->fetch_object()) {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!--Add Patient Form-->
                                        <form method="post">
                                            <div class="form-group col-md-2" style="display:none">
                                                <?php 
                                                    $length = 5;    
                                                    $vit_no =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                ?>
                                                <label for="inputZip" class="col-form-label">Vital Number</label>
                                                <input type="text" name="vit_number" value="<?php echo $vit_no;?>" class="form-control" id="inputZip">
                                            </div>

                                            <input type="hidden" name="fname" value="<?php echo $row->pat_fname;?>">
                                            <input type="hidden" name="mname" value="<?php echo $row->pat_mname;?>">
                                            <input type="hidden" name="lname" value="<?php echo $row->pat_lname;?>">
                                            <input type="hidden" name="dob" value="<?php echo $row->pat_dob;?>">
                                            <input type="hidden" name="age" value="<?php echo $row->pat_age;?>">
                                            <input type="hidden" name="address" value="<?php echo $row->pat_addr;?>">
                                            <input type="hidden" name="pat_ward" value="<?php echo $row->pat_ward;?>">
                                            <input type="hidden" name="pat_bed" value="<?php echo $row->pat_bed;?>">
                                            <input type="hidden" name="mobile" value="<?php echo $row->pat_phone;?>">
                                            <input type="hidden" name="ailment" value="<?php echo $row->pat_ailment;?>">
                                            <input type="hidden" name="pat_type" value="<?php echo $row->pat_type;?>">
                                            <input type="hidden" name="condition_arrival" value="<?php echo $row->condition_arrival;?>">
                                            <input type="hidden" name="pat_temp" value="<?php echo $row->pat_temp;?>">
                                            <input type="hidden" name="temp_method" value="<?php echo $row->temp_method;?>">
                                            <input type="hidden" name="pat_pulse" value="<?php echo $row->pat_pulse;?>">
                                            <input type="hidden" name="pat_bp" value="<?php echo $row->pat_bp;?>">
                                            <input type="hidden" name="pat_cardiac_rate" value="<?php echo $row->pat_cardiac_rate;?>">
                                            <input type="hidden" name="pat_resp_rate" value="<?php echo $row->pat_resp_rate;?>">
                                            <input type="hidden" name="pat_weight" value="<?php echo $row->pat_weight;?>">
                                            <input type="hidden" name="pat_curr_medication" value="<?php echo $row->pat_curr_medication;?>">
                                            <input type="hidden" name="pat_physical_findings" value="<?php echo $row->pat_physical_findings;?>">
                                            <input type="hidden" name="pat_diagnosis" value="<?php echo $row->pat_diagnosis;?>">
                                            <input type="hidden" name="plan" value="<?php echo $row->plan;?>">
                                            <input type="hidden" name="nurse_note" value="<?php echo $row->nurse_note;?>">
                                            <input type="hidden" name="date_time_disposition" value="<?php echo $row->date_time_disposition;?>">
                                            <input type="hidden" name="disposition" value="<?php echo $row->disposition;?>">
                                            <input type="hidden" name="condition_discharge" value="<?php echo $row->condition_discharge;?>">
                                            <input type="hidden" name="pat_ailment" value="<?php echo $row->pat_ailment;?>">
                                            <input type="hidden" name="condition_discharge" value="<?php echo $row->pat_ward;?>">
                                            <input type="hidden" name="pat_ailment" value="<?php echo $row->pat_ward;?>">
                                            <input type="hidden" name="pat_number" value="<?php echo $row->pat_number;?>">
                                            
                                            <input type="hidden" name="pat_ty" value="<?php echo $row->pat_number;?>">

                                            
                                        

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">First Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->pat_fname;?>" name="pat_fname" class="form-control" id="inputEmail4" placeholder="Patient's First Name" readonly>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Middle Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->pat_mname;?>" name="pat_mname" class="form-control" id="inputEmail4" placeholder="Patient's Middle Name" readonly>
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
                                                <div class="form-group col-md-1">
                                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_age;?>" name="pat_age" class="form-control"  id="inputPassword4" placeholder="Patient`s Age" readonly>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label for="pat_sex" class="col-form-label">Sex</label>
                                                    <input type="text" name="pat_sex" id="pat_sex" class="form-control" value="<?php echo $row->pat_sex;?>" readonly>
                                                </div>
                                                <div class="form-group col-md-2"> 
                                                    <label for="pat_civil_status" class="col-form-label">Civil Status</label>
                                                    <input name="pat_civil_status" id="pat_civil_status" class="form-control" value="<?php echo $row->pat_civil_status;?>" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputAddress" class="col-form-label">Address</label>
                                                    <input required="required" type="text" value="<?php echo $row->pat_addr;?>" class="form-control" name="pat_addr" id="inputAddress" placeholder="Patient's Addresss" readonly>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="condition_arrival" class="col-form-label">Condition on Arrival</label>
                                                    <select id="condition_arrival" required="required" name="condition_arrival" class="form-control">
                                                        <option>Choose</option>
                                                        <option value="Good">Good</option>
                                                        <option value="Fair">Fair</option>
                                                        <option value="Poor">Poor</option>
                                                        <option value="Shock">Shock</option>
                                                        <option value="Comatose">Comatose</option>
                                                        <option value="Hemorrhagic">Hemorrhagic</option>
                                                        <option value="DOA">DOA</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="pat_temp" class="col-form-label">Temperature</label>
                                                    <input required="required" type="text" name="pat_temp" class="form-control" id="pat_temp" title="Only numbers are allowed" value="<?php echo $row->pat_temp;?>" >
                                                    
                                                </div>
                                                <div class="form-group col-md-2">
                                                    
                                                    <label for="temp_method" class="col-form-label">Method</label>
                                                    <select id="temp_method" required="required" name="temp_method" class="form-control">
                                                        <option>Choose</option>
                                                        <option value="Axilla">Axilla</option>
                                                        <option value="Oral">Oral</option>
                                                        <option value="Anal">Anal</option>
                                                    </select>';
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="pat_pulse" class="col-form-label">Pulse</label>
                                                    <input required="required" type="text" name="pat_pulse" class="form-control" id="pat_pulse" value ="<?php echo $row->pat_pulse;?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="pat_bp" class="col-form-label">BP</label>
                                                    <input required="required" type="text" name="pat_bp" class="form-control" id="pat_bp" value="<?php echo $row->pat_bp;?>">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label for="pat_cardiac_rate" class="col-form-label">Cardiac Rate</label>
                                                    <input required="required" type="text" name="pat_cardiac_rate" class="form-control" id="pat_cardiac_rate" value="<?php echo $row->pat_cardiac_rate;?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="pat_resp_rate" class="col-form-label">Respiratory Rate</label>
                                                    <input required="required" type="text" name="pat_resp_rate" class="form-control" id="pat_resp_rate" value="<?php echo $row->pat_resp_rate;?>">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label for="pat_weight" class="col-form-label">Weight</label>
                                                    <input required="required" type="text" name="pat_weight" class="form-control" id="pat_weight" 
                                                    value="<?php echo $row->pat_weight;?>">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="pat_ailment" class="col-form-label">Chief Complaint</label>
                                                    <textarea required="required" name="pat_ailment" class="form-control" id="pat_ailment" rows="7" cols="23" style="resize:none" ><?php echo $row->pat_ailment;?></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="pat_curr_medication" class="col-form-label">Current Medication</label>
                                                    <textarea required="required" name="pat_curr_medication" class="form-control" id="pat_curr_medication" rows="7" cols="23" style="resize:none"><?php echo $row->pat_curr_medication;?></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="pat_physical_findings" class="col-form-label">Physical Findings</label>
                                                    <textarea required="required" name="pat_physical_findings" class="form-control" id="pat_physical_findings" rows="7" cols="23" style="resize:none"><?php echo $row->pat_physical_findings;?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="pat_diagnosis" class="col-form-label">Diagnosis</label>
                                                    <textarea name="pat_diagnosis" class="form-control" id="pat_diagnosis" rows="7" cols="23" style="resize:none"><?php echo $row->pat_diagnosis;?></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="plan" class="col-form-label">Plan</label>
                                                    <textarea name="plan" class="form-control" id="plan" rows="7" cols="23" style="resize:none"><?php echo $row->plan;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="nurse_note" class="col-form-label">Nurse's Notes</label>
                                                    <textarea required="required" name="nurse_note" class="form-control" id="nurse_note" rows="9" cols="23" style="resize:none"><?php echo $row->nurse_note;?></textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="date_time_disposition" class="col-form-label">Date and Time of Disposition</label>
                                                    <input type="datetime-local" name="date_time_disposition" class="form-control" id="date_time_disposition" value="<?php echo $row->date_time_disposition;?>">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="disposition" class="col-form-label">Disposition</label>
                                                    <select id="disposition" name="disposition" class="form-control">
                                                        <option>Choose</option>
                                                        <option value="Treated and Sent Home">Treated and Sent Home</option>
                                                        <option value="For Admission">For Admission</option>
                                                        <option value="Transferred/Referred">Transferred/Referred</option>
                                                        <option value="Abscended">Abscended</option>
                                                        <option value="Refused Admission">Refused Admission</option>
                                                        <option value="HAMA/DAMA/HPR">HAMA/DAMA/HPR</option>
                                                        <option value="Out When Called">Out When Called</option>
                                                        <option value="Died">Died</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="condition_discharge" class="col-form-label">Condition on Discharge</label>
                                                    <select id="condition_discharge" name="condition_discharge" class="form-control">
                                                        <option>Choose</option>
                                                        <option value="Stable">Stable</option>
                                                        <option value="Clinical">Clinical</option>
                                                        <option value="Expired">Expired</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="pat_type" class="col-form-label">Patient's Type</label>
                                                    <select id="pat_type" required="required" name="pat_type" class="form-control">
                                                        <option>Choose</option>
                                                        <option value="InPatient">InPatient</option>
                                                        <option value="OutPatient">OutPatient</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputWard" class="col-form-label">Ward Number</label>
                                                        <select id="pat_ward" name="pat_ward" class="form-control">
                                                            <?php
                                                                $qry = "SELECT * FROM his_ward WHERE is_full = '1'";
                                                                $stmt = $mysqli->prepare($qry);
                                                                // $stmt->bind_param('i', $value);
                                                                $stmt->execute();
                                                                $result = $stmt->get_result();
                                                                while($row=$result->fetch_object()) {
                                                                    echo '<option value='.$row->ward_id .'>'. $row->ward_id .'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="inputBed" class="col-form-label">Bed Number</label>
                                                        <select id="pat_bed" name="pat_bed" class="form-control">
                                                            <?php 
                                                                // fetch the data from the database
                                                                $qry = "SELECT * FROM his_bed WHERE is_taken = '1'";
                                                                $stmt = $mysqli->prepare($qry);
                                                                // $stmt->bind_param('i', $value);
                                                                $stmt->execute();
                                                                $result = $stmt->get_result();
                                                                while($row=$result->fetch_object()) {
                                                                    echo '<option value='.$row->bed_id .'>'. $row->bed_id .'</option>';
                                                                }
                                                            ?>
                                                        </select>
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

        <script>
            window.onload = function() {
                function setDefaultValue() {
                    let condition_arrival = document.getElementsByName("condition_arrival")[0].value;
                    let disposition = document.getElementsByName("disposition")[0].value;
                    let temp_method = document.getElementsByName("temp_method")[0].value;
                    let condition_discharge = document.getElementsByName("condition_discharge")[0].value;
                    let pat_type = document.getElementsByName("pat_type")[0].value;
                    let pat_ward = document.getElementsByName("pat_ward")[0].value;
                    let pat_bed = document.getElementsByName("pat_bed")[0].value;


                    let arrival_options = document.querySelectorAll("#condition_arrival option");
                    let disposition_options = document.querySelectorAll("#disposition option");
                    let temp_method_options = document.querySelectorAll("#temp_method option");
                    let condition_discharge_options = document.querySelectorAll("#condition_discharge option");
                    let pat_type_options = document.querySelectorAll("#pat_type option");
                    let pat_ward_options = document.querySelectorAll("#pat_ward option");
                    let pat_bed_options = document.querySelectorAll("#pat_bed option");

                    for (let i = 0; i < arrival_options.length; i++) {
                        if (arrival_options[i].value === condition_arrival) {
                            arrival_options[i].selected = true;
                            break;
                        }
                    }
                    for (let i = 0; i < disposition_options.length; i++) {
                        if (disposition_options[i].value === disposition) {
                            disposition_options[i].selected = true;
                            break;
                        }
                    }
                    for (let i = 0; i < temp_method_options.length; i++) {
                        if (temp_method_options[i].value === temp_method) {
                            temp_method_options[i].selected = true;
                            break;
                        }
                    }
                    for (let i = 0; i < condition_discharge_options.length; i++) {
                        if (condition_discharge_options[i].value === condition_discharge) {
                            condition_discharge_options[i].selected = true;
                            break;
                        }
                    }
                    for (let i = 0; i < pat_type_options.length; i++) {
                        if (pat_type_options[i].value === pat_type) {
                            pat_type_options[i].selected = true;
                            break;
                        }
                    }
                    for (let i = 0; i < pat_ward_options.length; i++) {
                        if (pat_ward_options[i].value === pat_ward) {
                            pat_ward_options[i].selected = true;
                            break;
                        }
                    }
                    for (let i = 0; i < pat_bed_options.length; i++) {
                        if (pat_bed_options[i].value === pat_bed) {
                            pat_bed_options[i].selected = true;
                            break;
                        }
                    }
                }
                setDefaultValue();
            };
        </script>
    </body>

</html>