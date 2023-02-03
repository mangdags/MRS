<?php
	session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['ad_id'];
?>
<!DOCTYPE html>
<html>
<?php include('assets/inc/head.php');?>
<body te>
	<div id="wrapper">
		<?php include('assets/inc/nav.php');?>
		<?php include("assets/inc/sidebar.php");?>
		<div class="text-center" style="margin-top: 100px;"><button onclick="printDiv('printMe')">Print CERTIFICATE</button></div>
	</div>
	<div id='printMe' style="text-align: center;">
		<?php 
		$mdr_id = $_GET['mdr_id'];
		$ret="SELECT * FROM  his_medical_records WHERE mdr_id ='$mdr_id'";
		$stmt= $mysqli->prepare($ret);
		 $stmt->execute();
		 $res=$stmt->get_result();
		 $cnt=1;
		 while($row=$res->fetch_object()) {
		?>
		<table style="text-align: center;">
			<tr>
				<td rowspan="4"><img src="../../assets/images/Mylogo.png" style="width: 40%; margin-top: 50px;"></td>
				<td style="margin-top: 20px;"> <h4 style="margin-left: -130px; margin-top: 50px">Republic of the Philippines</h4> <br>
					<h4 style="margin-top: -20px; margin-left: -130px; ">Province of Ilocos Sur</h4>
					<h3 style="margin-top: -10px; margin-left: -130px; color: green;">Ilocos SUR DISTRICT HOSPITAL MAGSINGAL</h3>
					<h4 style="margin-top: -10px; margin-left: -130px;">Masingal, Ilocos Sur</h4>
					<h4 style="margin-top: -10px; margin-left: -130px;">e-mail address: <u>hospitalmagsingaldistrict@yahoo.com</u></h4>
				</td>
		</table>
		<hr style="height:4px;border-width:0;color:gray;background-color:gray; width: 80%;">
		<div style="text-align: center;">
			<h1>Medical Certificate</h1>
			<br>
			<br>
			<h5 style="text-align:right; margin-right: 150px;"><u>____<?php echo date("Y/m/d") ?>____</u></h5>
			<h5 style="text-align:right; margin-right: 200px; margin-top: -10px;">Date</h5>
			<br>
			<br>
			<h5 style="text-align: left; margin-left: 150px;">TO WHOM IT MAY CONCERN:</h5>
			<h5 style="text-align: left; margin-left: 200px;">THIS IS TO CERTIFY THAT _______<u><?php echo $row->mdr_pat_name ?></u>___ , _____ <u><?php echo $row->mdr_pat_age ?></u>_______</h5>
			<h5 style="text-align: left; margin-left: 200px;">years old, child/male/female/single/married/widow from _____<u><?php echo $row->mdr_pat_adr ?></u>_________</h5>
			<h5 style="text-align: left; margin-left: 200px;">has been examine/treated/confined in this hospital by the undersigned on  ___________________</h5>
			<h5 style="text-align: left; margin-left: 200px;">with the diagnosis of _________________________________________________________</h5>
			<h5 style="text-align: left; margin-left: 200px;">_______________________________________________________________________________</h5>
			<br>
			<h5 style="text-align: left; margin-left: 200px;"> THIS CERTIFICATION is being issued upon request of ______________________ for</h5>
			<h5 style="text-align: left; margin-left: 200px;">__________________________________________________________ purpose.</h5>
			<br>
			<h3 style="text-align: right; margin-right: 200px; margin-top: 200px;">________<u>MD</u>________</h3>
			<h5 style="text-align: right; margin-right: 250px; margin-top: -10px;">Medical Officer III</h5>
			<h5 style="text-align: right; margin-right: 290px; margin-top: -10px;">Lic. No</h5>
		</div>
	<?php } ?>
	</div>
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