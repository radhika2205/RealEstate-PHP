document.addEventListener("DOMContentLoaded", function () {
    fetch("fetch_pending_properties.php")
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById("propertyList");
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
});

function approveProperty(pid) {
    fetch("approve_property.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `pid=${pid}`
    }).then(() => location.reload());
}

function rejectProperty(pid) {
    fetch("reject_property.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `pid=${pid}`
    }).then(() => location.reload());
}
