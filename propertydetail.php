<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();

include("config.php");

// ✅ Property ID aur User ID Fetch Karo
$pid = isset($_REQUEST['pid']) ? intval($_REQUEST['pid']) : 0;
$uid = isset($_SESSION['uid']) ? intval($_SESSION['uid']) : 0;

if ($pid > 0) {
    // ✅ Property aur User Fetch Query (Single Query)
    $stmt = $conn->prepare("SELECT property.*, user.* FROM property INNER JOIN user ON property.uid = user.uid WHERE property.pid = ?");
    $stmt->bind_param("i", $pid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $row = null;
    }
    
    $stmt->close();
} else {
    $row = null;
}

// ✅ Payment Status Check Query
$payment_done = false;

if ($uid > 0 && $pid > 0) {
    $stmt = $conn->prepare("SELECT * FROM payments WHERE uid = ? AND pid = ? AND status = 'approved'");
    $stmt->bind_param("ii", $uid, $pid);
    $stmt->execute();
    $result = $stmt->get_result();
    $payment_done = ($result->num_rows > 0);
    $stmt->close();
}

// ✅ Payment UPI Details
$amount = 100;
$upi_id = "yourupiid@upi"; // Replace with your actual UPI ID
$upi_link = "upi://pay?pa=$upi_id&pn=RealEstate&mc=&tid=&tr=&tn=Pay+to+view+contact&am=$amount&cu=INR";

?>



<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Real Estate PHP">
<meta name="keywords" content="">
<meta name="author" content="Unicoder">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<!--	Title
	=========================================================-->
<title>Real Estate PHP</title>
</head>
<body>





<div id="page-wrapper">
    <lass="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>

        
    
        <!--	Header end  -->
        
        <!--	Banner   --->
        <div class="banner-full-row page-banner" style="background-image:url('images/breadcromb.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Property Detail</b></h2>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb" class="float-left float-md-right">
                            <ol class="breadcrumb bg-transparent m-0 p-0">
                                <li class="breadcrumb-item text-white"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active"> <a href="property.php">Properties</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
         <!--	Banner   --->

		
        <di class="full-row">
            <div class="container">
                <div class="row">
				
                

                <?php
						$id=$_REQUEST['pid']; 
						$query=mysqli_query($conn,"SELECT property.*, user.* FROM `property`,`user` WHERE property.uid=user.uid and pid='$id'");
						while($row=mysqli_fetch_array($query))
						{
					  ?>

				  
                    <div class="col-lg-8">

                    <div class="row">
                            <div class="col-md-12">
                                <div id="single-property" style="width:1200px; height:700px; margin:30px auto 50px;"> 
                                    
                                    <!-- Slide 1-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['11'];?>" class="ls-bg" alt=""  /> </div>
                                    
                                    <!-- Slide 2-->
                                    <div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['12'];?>" class="ls-bg" alt=""  /> </div>
									
									<!-- Slide 3-->
									<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['13'];?>" class="ls-bg" alt=""  /> </div>
									
									<!-- Slide 4-->
									<div class="ls-slide" data-ls="duration:7500; transition2d:5; kenburnszoom:in; kenburnsscale:1.2;"> <img width="1920" height="1080" src="admin/property/<?php echo $row['14'];?>" class="ls-bg" alt=""  /> </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="bg-success d-table px-3 py-2 rounded text-white text-capitalize">For <?php echo $row['5'];?></div>
                                <h5 class="mt-2 text-secondary text-capitalize"><?php echo $row['1'];?></h5>
                                <span class="mb-sm-20 d-block text-capitalize"><i class="fas fa-map-marker-alt text-success font-12"></i> &nbsp;<?php echo $row['8'];?></span>
							</div>
                            <div class="col-md-6">
                                <div class="text-success text-left h5 my-2 text-md-right">Rs.<?php echo $row['7'];?></div>
                                <div class="text-left text-md-right">Price</div>
                            </div>
                        </div>
                        <div class="property-details">
                            <div class="bg-gray property-quantity px-4 pt-4 w-100">
                                <ul>
                                    <li><span class="text-secondary"><?php echo $row['6'];?></span> Sqft</li>
                                    
                                </ul>
                            </div>
                            <h4 class="text-secondary my-4">Description</h4>
                            <p><?php echo $row['2'];?></p>
                            
                            <h5 class="mt-5 mb-4 text-secondary">Property Summary</h5>
                            <div  class="table-striped font-14 pb-2">
                                <table class="w-100">
                                    <tbody>
                                        <tr>
                                            <td>BHK :</td>
                                            <td class="text-capitalize"><?php echo $row['4'];?></td>
                                            <td>Property Type :</td>
                                            <td class="text-capitalize"><?php echo $row['3'];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>City :</td>
                                            <td class="text-capitalize"><?php echo $row['9'];?></td>
                                            <td>State :</td>
                                            <td class="text-capitalize"><?php echo $row['10'];?></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                              
							<!-- payment -->
                           
                            
<?php
                            if ($payment_done) { ?>
    <h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Contact Agent</h5>
    <div class="agent-contact pt-60">
        <div class="row"></div>
        <div class="col-sm-4 col-lg-3"></div>
        <img src="admin/user/<?php echo $row['uimage']; ?>" alt="" height="200" width="170"> 
    </div>
    <h4 class="text-success"><?php echo $row['uname']; ?></h4>
    <ul class="mb-3">
        <li>📞 Phone: <?php echo $row['uphone']; ?></li>
        <li>📧 Email: <?php echo $row['uemail']; ?></li>
    </ul>
<?php 
} else { ?>
    <h5 class="mt-5 mb-4 text-secondary double-down-line-left position-relative">Pay to View Contact Details</h5>
    <img src="images/qr (2).jpg" alt="Scan to Pay" class="qr-code" 
         style="width: 35mm; height: 45mm; object-fit: contain; border-radius: 5px; display: block; margin:0;">
    <p>Scan the QR code to pay ₹<?php echo $amount; ?> and unlock contact details.</p>
    <a href="<?php echo $upi_link; ?>" class="btn btn-success" target="_blank">Pay Now</a>

    <form action="verify_payment.php" method="POST">
    <input type="hidden" name="pid" value="<?php echo isset($_GET['pid']) ? $_GET['pid'] : ''; ?>">
    <input type="text" name="txn_id" placeholder="Enter Transaction ID" required>
    <button type="submit">Verify Payment</button>
</form>

<?php } ?>

<?php } ?>
<!-- payment -->
 <?php  ?>
        </div>
    </div>
</div>
</div>

</div>


         <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>
<!-- Wrapper End --> 

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script> 

</body>

</html>