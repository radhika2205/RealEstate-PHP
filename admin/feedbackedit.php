<?php 
session_start();
require("config.php");

if(!isset($_SESSION['auser']))
{
	header("location:index.php");
}

$msg="";

$fid = $_GET['id'];

// Fetch original feedback date
$sql = "SELECT date FROM feedback WHERE fid = {$fid}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$original_date = $row['date']; // Original feedback date

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>LM HOMES | About</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/css/select2.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<!-- Header -->
	<?php include("header.php"); ?>

	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content container-fluid">
			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col">
						<h3 class="page-title">Feedback</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Feedback</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
			
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h2 class="card-title">Feedback Details</h2>
						</div>
						<form>
							<div class="card-body">
								<div class="row">
									<div class="col-xl-12">
										
										<?php echo $msg; ?>
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Feedback Id</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="fid" value="<?php echo $fid; ?>" disabled>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Date</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="date" 
													   value="<?php echo date('Y-m-d H:i:s', strtotime($original_date)); ?>" 
													   readonly>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- /Page Wrapper -->

	<!-- Scripts -->
	<script src="assets/plugins/tinymce/tinymce.min.js"></script>
	<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/select2.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>
