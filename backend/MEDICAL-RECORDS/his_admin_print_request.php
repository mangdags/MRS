<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>

<!DOCTYPE html>
<html lang="en">
    
<?php include('assets/inc/head.php');?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
                <?php include('assets/inc/nav.php');?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Medical Records</a></li>
                                            <li class="breadcrumb-item active">Print Request</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Print Request</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <?php 
                            $mdr_id = $_GET['mdr_id'];
                            $ret="SELECT * FROM  his_medical_records WHERE mdr_id ='$mdr_id'";
                            $stmt= $mysqli->prepare($ret);
                            $stmt->execute();
                            $res=$stmt->get_result();
                            $cnt=1;
                            while($row=$res->fetch_object()) {
                                $mdr_pat_number = $row->mdr_pat_number;
                                
                                $qry = "SELECT * FROM `his_patients` WHERE `pat_number` = '$mdr_pat_number'";
                                $stmt = $mysqli->prepare($qry);
                                $stmt->execute();
                                $rs = $stmt->get_result();
                                while($row2=$rs->fetch_object()){
                        ?>
                        <form method="post" action="print.php">
                            <?php
                                $pat_name = $row->mdr_pat_name;
                                $pat_age = $row->mdr_pat_age;
                                $civil_status = $row2->pat_civil_status;
                                $pat_adr = $row->mdr_pat_adr;
                                $pat_diag = $row2->pat_diagnosis;
                                $disposition = $row2->disposition;
                                $date = $row2->pat_date_joined;
                                // if(isset($_POST['print_certificate'])){
                                //     $requestor = $_POST['purpose_request'];
                                //     $purpose = $_POST['purpose_request'];
                                    
                                // }
                                
                                echo "<input type='hidden' name='req_name' id='req_name' value=''>";
                                echo "<input type='hidden' name='req_purpose' id='req_purpose' value=''>";

                                echo "<input type='hidden' name='pat_name' value='$pat_name'>";
                                echo "<input type='hidden' name='pat_age' value='$pat_age'>";
                                echo "<input type='hidden' name='pat_cs' value='$civil_status'>";
                                echo "<input type='hidden' name='pat_address' value='$pat_adr'>";
                                echo "<input type='hidden' name='pat_diag' value='$pat_diag'>";
                                echo "<input type='hidden' name='disposition' value='$disposition'>";
                                echo "<input type='hidden' name='date' value='$date'>"; 
                            ?>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="col-form-label">Patient's Name</label>
                                    <input type="text" required="required" value="<?php echo $pat_name; ?>" name="mdr_pat_name" class="form-control" id="inputEmail4" placeholder="Patient's Name" readonly>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputPassword4" class="col-form-label">Age</label>
                                    <input required="required" type="text" value="<?php echo $pat_age; ?>" name="mdr_pat_age" class="form-control"  id="inputPassword4" placeholder="Patient`s Age" readonly>
                                </div>
                                <div class="form-group col-md-2"> 
                                    <label for="pat_civil_status" class="col-form-label">Civil Status</label>
                                    <input name="pat_civil_status" id="pat_civil_status" class="form-control" value="<?php echo $civil_status; ?>" readonly>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputAddress" class="col-form-label">Address</label>
                                    <input required="required" type="text" value="<?php echo $pat_adr; ?>" class="form-control" name="mdr_pat_adr" id="inputAddress" placeholder="Patient's Addresss" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="pat_diagnosis" class="col-form-label">Diagnosis</label>
                                    <textarea required="required" name="pat_diagnosis" class="form-control" id="pat_diagnosis" rows="4" cols="23" style="resize:none" ><?php echo $pat_diag; ?></textarea>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4" class="col-form-label">Date of Admission/Check-up</label>
                                    <input type="text" required="required" name="date" class="form-control" id="inputEmail4" placeholder="Date of Admission/Check-up" value="<?php echo $date; ?>" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4" class="col-form-label">Disposition</label>
                                    <input type="text" required="required" name="disposition" class="form-control" id="inputEmail4" placeholder="Disposition" value="<?php echo $disposition; ?>" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputEmail4" class="col-form-label">Requestor</label>
                                    <input type="text" required="required" name="requestor_name" class="form-control" id="requestor_name" placeholder="Requestor's Name">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4" class="col-form-label">Purpose</label>
                                    <input type="text" required="required" name="purpose_request" class="form-control" id="purpose_request" placeholder="Purpose of Request">
                                </div>
                            </div>

                            <button onclick="printDiv('printMe')" type="submit" id="print_certificate" name="print_certificate" class="ladda-button btn btn-success">Review Certificate</button>
                        </form>
                        <?php }}?>
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

        <!-- Footable js -->
        <script src="assets/libs/footable/footable.all.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/foo-tables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <script>
            document.getElementById("print_certificate").addEventListener("click", function(){
                var requestor = document.getElementById("requestor_name").value;
                var purpose = document.getElementById("purpose_request").value;

                document.getElementById("req_name").value = requestor;
                document.getElementById("req_purpose").value = purpose;
            });

        </script>
        
    </body>

</html>