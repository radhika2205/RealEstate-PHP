<?php
include('config.php');

if (isset($_POST['approve_payment'])) {
    $payment_id = $_POST['payment_id'];

    $update_sql = "UPDATE payments SET status='approved' WHERE id=?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("i", $payment_id);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Payment Approved!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('❌ Error in approving payment!');</script>";
    }
    $stmt->close();
}
?>
