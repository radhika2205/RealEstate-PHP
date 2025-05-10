<?php
session_start();
include("config.php");

if (isset($_GET['id'])) {
    $payment_id = intval($_GET['id']);

    // ✅ Payment Status Update Karvani Query (Approved)
    $sql = "UPDATE payments SET status='approved' WHERE payment_id='$payment_id'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_msg'] = "✅ Payment Approved Successfully!";
    } else {
        $_SESSION['error_msg'] = "❌ Error Approving Payment: " . mysqli_error($conn);
    }
}

// Redirect back to the payment list or dashboard
header("Location: dashboard.php");
exit();
?>
