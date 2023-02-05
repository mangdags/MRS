<?php
	session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  
  include('assets/inc/nav.php');
  include("assets/inc/sidebar.php");
  check_login();
  $aid=$_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html>
<?php include('assets/inc/head.php');?>
	<style>
		@media print {
			input[type=text], input[type=button] {
				display: none !important;
			}
			@page {
				margin: 100;
				size: auto;
			}
			body {
				margin: 0.6cm;
			}
		}
	</style>
<body>
	<div id='printMe' style="text-align: center;">
		<?php
			$requestor = $_POST['req_name'];
			$purpose = $_POST['req_purpose'];
			$pat_name = $_POST['pat_name'];
			$pat_age = $_POST['pat_age'];
			$civil_status = $_POST['pat_cs'];
			$pat_adr = $_POST['pat_address'];
			$pat_diag = $_POST['pat_diag'];
			$disposition = $_POST['disposition'];
			$date = $_POST['date'];
		?>

		<table style="text-align: center;">
			<tr>
				<td rowspan="4"><img src="../../assets/images/Mylogo.png" style="width: 40%; margin-top: 50px;"></td>
				<td style="margin-top: 20px;"> <h4 style="margin-left: -130px; margin-top: 50px">Republic of the Philippines</h4> <br>
					<h4 style="margin-top: -20px; margin-left: -130px; ">Province of Ilocos Sur</h4>
					<h3 style="margin-top: -10px; margin-left: -130px; color: green;">Ilocos SUR DISTRICT HOSPITAL MAGSINGAL</h3>
					<h4 style="margin-top: -10px; margin-left: -130px;">Magsingal, Ilocos Sur</h4>
					<h4 style="margin-top: -10px; margin-left: -130px;">e-mail address: <u>hospitalmagsingaldistrict@yahoo.com</u></h4>
				</td>
		</table>
		<hr style="height:4px;border-width:0;color:gray;background-color:gray; width: 80%;">
		<div style="text-align: center;">
			<h1>Medical Certificate</h1>
			<h5 style="text-align:right; margin-right: 70px;"><u>&nbsp;&nbsp;<?php echo date("Y/m/d") ?>&nbsp;&nbsp;</u></h5>
			<h5 style="text-align:right; margin-right: 100px; margin-top: -10px;">Date</h5>
			<br>
			<h5 style="text-align: left; margin-left: 50px;">TO WHOM IT MAY CONCERN:</h5>
			<h5 style="text-align: left; margin-left: 100px;">THIS IS TO CERTIFY THAT <u>&nbsp;&nbsp;<?php echo $pat_name ?>&nbsp;&nbsp;</u>, <u>&nbsp;&nbsp;<?php echo $pat_age ?>&nbsp;&nbsp;</u> years old, <u>&nbsp;&nbsp;<?php echo $civil_status ?>&nbsp;&nbsp;</u> from <u>&nbsp;&nbsp;&nbsp;<?php echo $pat_adr ?>&nbsp;&nbsp;&nbsp;</u></h5>
			<h5 style="text-align: left; margin-left: 100px;">has been <u><?php echo $disposition ?></u> in this hospital by the undersigned on  <u>&nbsp;&nbsp;&nbsp;<?php echo $date ?>&nbsp;&nbsp;&nbsp;</u></h5>
			<h5 style="text-align: left; margin-left: 100px;">with the diagnosis of; <u>&nbsp;&nbsp;<?php echo $pat_diag ?>&nbsp;&nbsp;</u></h5>
			<h5 style="text-align: left; margin-left: 100px;"> THIS CERTIFICATION is being issued upon request of <u>&nbsp;&nbsp;<?php echo $requestor; ?>&nbsp;&nbsp;</u> for <u>&nbsp;&nbsp;<?php echo $purpose ?>&nbsp;&nbsp;</u> purpose.</h5>
			<h3 style="text-align: right; margin-right: 50px; margin-top: 100px;"><u>&emsp;&emsp;&emsp;MD&emsp;&emsp;&emsp;</u></h3>
			<h5 style="text-align: right; margin-right: 70px; margin-top: -10px;">Medical Officer III</h5>
			<h5 style="text-align: right; margin-right: 100px; margin-top: -10px;">Lic. No</h5>
		</div>
	</div>
	<div class="text-center" style="margin-top: 100px;"><button onclick="printDiv('printMe')">Print Certificate</button></div>
</body>
</html>
<!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Footable js -->
        <script src="assets/libs/footable/footable.all.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/foo-tables.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

	<script>
        function printDiv(divName){
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();

            document.body.innerHTML = originalContents;

        }
    </script>