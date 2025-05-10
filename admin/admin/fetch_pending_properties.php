<?php
include 'db_connection.php'; // Apna database connection file include karein

$sql = "SELECT pid, title, location, price FROM property WHERE status = 'Pending'";
$result = $conn->query($sql);

$properties = [];
while ($row = $result->fetch_assoc()) {
    $properties[] = $row;
}

echo json_encode($properties);
?>
