<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Approval</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .approve-btn {
            background-color: green;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .reject-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Pending Property Approvals</h2>
<table>
    <tr>
        <th>Property ID</th>
        <th>Title</th>
        <th>Location</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <tbody id="propertyList">
        <!-- Pending Properties yahan show hongi -->
    </tbody>
</table>

<script>
    // Fetch pending properties from backend
    fetch('fetch_pending_properties.php')
    .then(response => response.json())
    .then(data => {
        let tableBody = document.getElementById('propertyList');
        data.forEach(property => {
            let row = `<tr>
                <td>${property.pid}</td>
                <td>${property.title}</td>
                <td>${property.location}</td>
                <td>${property.price}</td>
                <td>
                    <button class="approve-btn" onclick="approveProperty(${property.pid})">Approve</button>
                    <button class="reject-btn" onclick="rejectProperty(${property.pid})">Reject</button>
                </td>
            </tr>`;
            tableBody.innerHTML += row;
        });
    });

    function approveProperty(pid) {
        fetch('approve_property.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `pid=${pid}`
        }).then(() => location.reload());
    }

    function rejectProperty(pid) {
        fetch('reject_property.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `pid=${pid}`
        }).then(() => location.reload());
    }
</script>

</body>
</html>
