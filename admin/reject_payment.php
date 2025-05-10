<?php
session_start();
include("config.php");

if (isset($_GET['id'])) {
    $payment_id = intval($_GET['id']);

    // ✅ Payment Status Update Query
    $sql = "UPDATE payments SET status='rejected' WHERE payment_id='$payment_id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_msg'] = "Payment Rejected Successfully!";
    } else {
        $_SESSION['error_msg'] = "Error Rejecting Payment: " . mysqli_error($conn);
    }
}

// ✅ Redirect back to admin dashboard
header("Location: dashboard.php");
exit();
?>
