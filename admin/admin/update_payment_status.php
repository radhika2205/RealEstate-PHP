<?php
include("config.php");

if (isset($_GET['payment_id']) && isset($_GET['status'])) {
    $payment_id = $_GET['payment_id'];
    $status = $_GET['status'];

    // Update payment status
    $sql = "UPDATE payments SET status = '$status' WHERE id = '$payment_id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Payment status updated!'); window.location.href='manage_payments.php';</script>";
    } else {
        echo "<script>alert('Error updating payment!'); window.history.back();</script>";
    }
}
?>
