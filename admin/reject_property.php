<?php
session_start();
include("config.php");

if (isset($_GET['id'])) {
    $pid = intval($_GET['id']);

    // ✅ Property Status Update Karvani Query
    $sql = "UPDATE property SET status='rejected' WHERE pid='$pid'";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_msg'] = "Property Rejected Successfully!";
    } else {
        $_SESSION['error_msg'] = "Error Rejecting Property: " . mysqli_error($conn);
    }
}

// Redirect back to admin dashboard
header("Location: dashboard.php");
exit();
?>
