<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_GET['$doc_id'])){
	$doctor_id = $_GET['$doc_id'];
	$patient_id = $_SESSION['id'];
}

if(!empty($doctor_id)){
	$query = "UPDATE doctor_patient_relation SET status = /'accepted/' WHERE `doctor_id`=$doctor_id and `patient_id` = $patient_id";/*
	$sql=mysqli_query($con,"update doctor_patient_relation set status = 'Accepted' where `patient_id` = $patient_id and `doctor_id` = $doctor_id");*/
	$sql=mysqli_query($con,$query);
	if($sql)
	{
		echo "<script>alert('Patient Accepted Successfully');</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor  | Dashboard</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />


	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
							<div class="container-fluid container-fullw bg-white">
								

								<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
									  <tr align="center">
									   <th colspan="8" >Request For History <?php echo $patient_id;	?></th> 
									  </tr>
									  <tr>
									    <th>#</th>
									<th>Patient ID</th>
									<th>Doctor ID</th>
									<th>Status</th>
									<th>Action</th>
									</tr>

									<?php
					               
					               $ret=mysqli_query($con,"select * from doctor_patient_relation");
									
									while ($row=mysqli_fetch_array($ret)) {
								?>


									<tr>
									     
									<td><?php  echo $row['id'];?></td>  
									<td><?php  echo $row['patient_id'];?></td>
									<td><?php  echo $row['doctor_id'];?></td>
									<td><?php  echo $row['status'];?></td>
									<td><button class="btn btn-o btn-primary">
										<a href="./patient_req.php?$doc_id=<?php echo $row['doctor_id']?>" >
										Pending..
									</button></td>
									
								<?php }?>	
								</table>
							
							</div>

						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
