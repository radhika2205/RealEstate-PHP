<?php
require("config.php");

// Fetch all properties where status is 'pending'
$sql = "SELECT pid, title, location, price FROM property WHERE status = 'pending'";
$result = $conn->query($sql); // `$conn` use karo instead of `$con`

$properties = [];

while ($row = $result->fetch_assoc()) {
    $properties[] = $row;
}

// Return JSON response
echo json_encode($properties);
?>
