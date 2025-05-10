<?php
session_start();
include('config.php');

if (!isset($_SESSION['uid'])) {
    echo "<script>alert('❌ Please log in first!'); window.location.href='login.php';</script>";
    exit();
}

$uid = $_SESSION['uid'];
$txn_id = trim($_POST['txn_id']);
$pid = intval($_POST['pid']);  // 📌 Property ID (Newly Added)
$amount = 100;  
$payment_date = date("Y-m-d H:i:s");

if (!empty($txn_id) && !empty($pid)) {
    // ✅ Check Duplicate Transaction ID
    $check_query = "SELECT * FROM payments WHERE txn_id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $txn_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('❌ Transaction ID already exists!');</script>";
    } else {
        // ✅ Insert Payment with Property ID
        $sql = "INSERT INTO payments (uid, pid, amount, payment_date, txn_id, status) 
                VALUES (?, ?, ?, ?, ?, 'pending')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiss", $uid, $pid, $amount, $payment_date, $txn_id);

        if ($stmt->execute()) {
            echo "<script>alert('✅ Payment Submitted! Waiting for Approval.');</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
} else {
    echo "<script>alert('❌ Please enter Transaction ID and select Property.');</script>";
}

$conn->close();
?>
