<?php
session_start();
include("config.php");

if (isset($_GET['id'])) {
    $pid = intval($_GET['id']);

    // ✅ Property Status Update Karvani Query (Approved)
    $sql = "UPDATE property SET status='approved' WHERE pid='$pid'";
    if (mysqli_query($conn, $sql)) {
        // ✅ property_approval table ma entry karva mate (approved_by ma "Admin" store karva mate)
        $insert_sql = "INSERT INTO property_approval (pid, status, approved_by, timestamp) 
                       VALUES ('$pid', 'Approved', 'Admin', NOW())";
        
        if (mysqli_query($conn, $insert_sql)) {
            $_SESSION['success_msg'] = "✅ Property Approved Successfully!";
        } else {
            $_SESSION['error_msg'] = "❌ Error Approving Property: " . mysqli_error($conn);
        }
    } else {
        $_SESSION['error_msg'] = "❌ Error Updating Property Status: " . mysqli_error($conn);
    }
}

// Redirect back to admin dashboard
header("Location: dashboard.php");
exit();
?>