<?php

session_start();
include("config.php");

if (isset($_SESSION['success_msg'])) {
    echo "<script>alert('" . $_SESSION['success_msg'] . "');</script>";
    unset($_SESSION['success_msg']); // Message remove kariye pachhi
}


// Count Properties
$total_pending = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM property WHERE status='pending'"))['count'];
$total_approved = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM property WHERE status='approved'"))['count'];
$total_rejected = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS count FROM property WHERE status='rejected'"))['count'];





?>


<!DOCTYPE html>
<div="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Dashboard</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		
    </head>
    <div>
	
		<!-- Main Wrapper -->

		
			<!-- Header -->
				<?php include("header.php"); ?>
			<!-- /Header -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header=margin :top">

						<div class="row">


							<div class="col-sm-12">
                                                       
                                                             <h3 class="page-title">Welcome Admin!</h3>
								<p></p>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
                                                   
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-primary">
											<i class="fe fe-users"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
										<h3><?php $sql = "SELECT * FROM user WHERE utype = 'user'";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted"><a href="userlist.php">Registered Users</a></h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-primary w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
                                                
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-success">
											<i class="fe fe-users"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM user WHERE utype = 'agent'";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted"><a href="useragent.php">Agents</a></h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
                                                
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-danger">
											<i class="fe fe-user"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM user WHERE utype = 'builder'";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted"><a href="userbuilder.php">Builder</a></h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
                                                 
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-info">
											<i class="fe fe-home"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM property";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted" ><a href="propertyview.php">Properties </a> </h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
                                                 
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-warning">
											<i class="fe fe-table"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM property where type = 'apartment'";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted">No. of flat</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
                                               
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-info">
											<i class="fe fe-home"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM property where type = 'house'";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted">No. of Raw house </h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
                                                
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-secondary">
											<i class="fe fe-building"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM property where type = 'building'";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted">No. of villa</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
                                                
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-primary">
											<i class="fe fe-tablet"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM property where type = 'flat'";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted">No. of bungalows</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
                                                  
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-success">
											<i class="fe fe-quote-left"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM property where stype = 'sale'";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted">On Sale</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
                                                
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-info">
											<i class="fe fe-quote-right"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT * FROM property where stype = 'rent'";
										$query = $conn->query($sql);
                						echo "$query->num_rows";?></h3>
										
										<h6 class="text-muted">Rentals</h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="col-xl-3 col-sm-6 col-12">
                                               
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-info">
											<i class="fe fe-home"></i>
										</span>
										
									</div>
									<div class="dash-widget-info">
										
									<h3><?php $sql = "SELECT SUM(amount) AS total_amount FROM payments";
$query = $conn->query($sql);
$row = $query->fetch_assoc();

echo "Total Payment Amount: ₹" . $row['total_amount'];?></h3>
										
										<h6 class="text-muted">payments </h6>
										<div class="progress progress-sm">
											<div class="progress-bar bg-info w-50"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					

					
				</div>			
			</div>
            
<!-- property -->
			                 <div class="col-xl-12 col-sm-6 col-6">
                            <div class="card">
								<div class="card-body">
									
			<div style="display: flex; flex-direction: column; align-items: center; text-align: center; margin: 20px auto; width: 100%;">
             <h2 class="text-muted">Pending Property Approvals</h2>
             <table class="table table-striped" style="width: 90%; table-layout: fixed;" margin="2px">
              <thead>
            <tr>
                <th style="width: 35%; text-align: center;">Property ID</th>
                <th style="width: 15%;">Title</th>
                <th style="width: 15%;padding-right: 15px;">Location</th>
                <th style="width: 15%; text-align: center;padding-right: 15px;">Price</th>
                <th style="width: 20%; text-align: right; padding-right: 15px;">Action</th>
            </tr>
        </thead>
        <tbody id="propertyList">
           
        </tbody>
    </table>
                                       </div>

										</div>
									</div>
								
					


<script>
    // Fetch pending properties and update the table
    fetch('fetch_pending_properties.php')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById('propertyList');
            tableBody.innerHTML = ''; // Clear previous content before adding new
            data.forEach(property => {
                let row = `<tr>
                    <td style="word-wrap: break-word; text-align: center;">${property.pid}</td>
                    <td style="word-wrap: break-word;">${property.title}</td>
                    <td style="word-wrap: break-word;">${property.location}</td>
                    <td style="text-align: center;">${property.price}</td>
                    <td style="text-align: right; padding-right: 15px;">
                        <a href="approve_property.php?id=${property.pid}" class="btn btn-success">Approve</a>
                        <a href="reject_property.php?id=${property.pid}" class="btn btn-danger">Reject</a>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });
        });
</script>



<!-- property  and -->



<!-- payment -->
<div class="col-xl-12 col-sm-6 col-6">
    <div class="card">
        <div class="card-body">
            <div style="display: flex; flex-direction: column; align-items: center; text-align: center; margin: 20px auto; width: 100%;">
                <h2 class="text-muted">Pending Payment Approvals</h2>
                <table class="table table-striped" style="width: 90%; table-layout: fixed;">
                    <thead>
                        <tr>
                            <th style="width: 35%; text-align: center;">Payment ID</th>
                            <th style="width: 15%;">User ID</th>
                            <th style="width: 20%;">Property ID</th>
                            <th style="width: 20%; text-align: center;">Amount</th>
                            <th style="width: 20%; text-align: right; padding-right: 15px;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="paymentList"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Fetch pending payments and update the table
    fetch('fetch_pending_payment.php')
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById('paymentList');
            tableBody.innerHTML = ''; // Clear previous content before adding new
            data.forEach(payment => {
                let row = `<tr>
                    <td style="text-align: center;">${payment.payment_id}</td>
                    <td>${payment.uid}</td>
                    <td>${payment.pid}</td>
                    <td style="text-align: center;">${payment.amount}</td>
                    <td style="text-align: right; padding-right: 15px;">
                        <a href="approve_payment.php?id=${payment.payment_id}" class="btn btn-success">Approve</a>
                        <a href="reject_payment.php?id=${payment.payment_id}" class="btn btn-danger">Reject</a>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error('Error fetching payments:', error));
</script>

<!-- payment and -->

<!-- close to payment approval -->
                
                
			<!-- /Page Wrapper -->
		

		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<script src="assets/plugins/raphael/raphael.min.js"></script>    
		<script src="assets/plugins/morris/morris.min.js"></script>  
		<script src="assets/js/chart.morris.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

</html>
