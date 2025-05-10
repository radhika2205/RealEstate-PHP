<?php
session_start();
include("config.php");

// Fetch all pending payments
$sql = "SELECT payments.*, property.title, user.uname FROM payments 
        JOIN property ON payments.pid = property.pid 
        JOIN user ON payments.user_id = user.uid
        WHERE payments.status = 'Pending'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Payments</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Pending Payments</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Property</th>
                    <th>User</th>
                    <th>Transaction ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['uname']; ?></td>
                        <td><?php echo $row['txn_id']; ?></td>
                        <td>
                            <a href="update_payment_status.php?payment_id=<?php echo $row['id']; ?>&status=Approved" class="btn btn-success">Approve</a>
                            <a href="update_payment_status.php?payment_id=<?php echo $row['id']; ?>&status=Rejected" class="btn btn-danger">Reject</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
