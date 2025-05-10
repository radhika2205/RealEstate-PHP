<?php
require("config.php");

// Fetch pending payments
$sql = "SELECT payment_id, uid, pid, amount FROM payments WHERE status = 'pending'";
$result = $conn->query($sql);

$payments = [];

while ($row = $result->fetch_assoc()) {
    $payments[] = $row;
}

// Return JSON response
echo json_encode($payments);
?>
