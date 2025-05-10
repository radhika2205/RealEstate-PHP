<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = $_POST['pid'];
    $sql = "UPDATE property SET status = 'Rejected' WHERE pid = $pid";

    if ($conn->query($sql) === TRUE) {
        echo "Property Rejected!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
