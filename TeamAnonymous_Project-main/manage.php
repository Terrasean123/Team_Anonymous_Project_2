<?php
    require_once 'db_connection.php';  // Include database connection

    if (isset($_POST['updateStatus'])) {
    // Get and sanitize input values from the form
        $eoi_id = mysqli_real_escape_string($conn, $_POST['eoi_id']);
        $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);

        // Update the status for the specified EOI ID
        $sql = "UPDATE eoi SET status = '$new_status' WHERE id = '$eoi_id'";

        if (mysqli_query($conn, $sql)) {
            echo "Status updated successfully for EOI ID: " . htmlspecialchars($eoi_id);
        } else {
            echo "Error updating status: " . mysqli_error($conn);
        }
    }

    if (isset($_POST['deleteJobRefNum']) && $_POST['deleteJobRefNum'] !== '') {
    // Sanitize input to prevent SQL injection
        $deleteJobRefNum = mysqli_real_escape_string($conn, $_POST['deleteJobRefNum']);
        
        // Prepare DELETE SQL query to remove EOIs with the specified job reference number
        $deleteSql = "DELETE FROM eoi WHERE job_reference_number = '$deleteJobRefNum'";
        $deleteResult = mysqli_query($conn, $deleteSql);
        
        if ($deleteResult) {
            // Check if any rows were actually deleted
            if (mysqli_affected_rows($conn) > 0) {
                echo "<p>Successfully deleted EOI(s) with Job Reference Number: <strong>" . htmlspecialchars($deleteJobRefNum) . "</strong>.</p>";
            } else {
                // No matching records found to delete
                echo "<p>No EOI found with Job Reference Number: <strong>" . htmlspecialchars($deleteJobRefNum) . "</strong>.</p>";
            }
        } else {
            // Display error message if deletion failed
            echo "<p>Error deleting EOI: " . mysqli_error($conn) . "</p>";
        }
    }
    // Check if any search parameter or 'displayAll' is set
    if (
        (isset($_GET['jobRefNum']) && $_GET['jobRefNum'] !== '') ||
        (isset($_GET['firstName']) && $_GET['firstName'] !== '') ||
        (isset($_GET['lastName']) && $_GET['lastName'] !== '') ||
        isset($_GET['displayAll'])
    ) {
        if (isset($_GET['displayAll'])) {
            // Query to select all EOIs
            $sql = "SELECT * FROM eoi";
        } else {
            $conditions = [];

            // Add job reference number condition if provided
            if (!empty($_GET['jobRefNum'])) {
                $jobRefNum = mysqli_real_escape_string($conn, $_GET['jobRefNum']);
                $conditions[] = "job_reference_number LIKE '%$jobRefNum%'";
            }

            // Add first name condition if provided
            if (!empty($_GET['firstName'])) {
                $firstName = mysqli_real_escape_string($conn, $_GET['firstName']);
                $conditions[] = "first_name LIKE '%$firstName%'";
            }

            // Add last name condition if provided
            if (!empty($_GET['lastName'])) {
                $lastName = mysqli_real_escape_string($conn, $_GET['lastName']);
                $conditions[] = "last_name LIKE '%$lastName%'";
            }

            // Combine all conditions with AND
            $sql = "SELECT * FROM eoi WHERE " . implode(' AND ', $conditions);
        }

        $result = mysqli_query($conn, $sql);  // Execute the query

        if (mysqli_num_rows($result) > 0) {
            // Display table header
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>EOI_ID</th><th>Job Reference Number</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Skills</th><th>Street Address</th><th>Suburb/Town</th><th>State</th><th>Postcode</th><th>Gender</th><th>DOB</th><th>Qualifications</th><th>Status</th></tr>";
            // Loop through each row and display data
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['job_reference_number'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone_number'] . "</td>";
                echo "<td>" . $row['skills'] . "</td>";
                echo "<td>" . $row['street_address'] . "</td>";
                echo "<td>" . $row['suburb_town'] . "</td>";
                echo "<td>" . $row['state'] . "</td>";
                echo "<td>" . $row['postcode'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['qualifications'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            // No results found message
            echo "There are no EOI.";
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage EOI</title>
</head>
<body>
    <h2>Manage EOI's</h2>
    <form method="GET" action="manage.php">
        <input type="hidden" name="displayAll" value="1">
        <button type="submit">Display All EOIs</button>
    </form>
    <form method="GET" action="manage.php">
        <label for="jobRefNum">Job Reference Number:</label>
        <input type="text" id="jobRefNum" name="jobRefNum" />
        <button type="submit">Search</button>
    </form>
    <form method="GET" action="manage.php">
        <label for="firstName">First Name Search: </label>
        <input type="text" id="firstName" name="firstName" />
        <button type="submit">Search</button>
    </form>
    <form method="GET" action="manage.php">
        <label for="lastName">Last Name Search: </label>
        <input type="text" id="lastName" name="lastName" />
        <button type="submit">Search</button>
    </form>
    <form method="POST" action="manage.php">
    <label for="deleteJobRefNum">Job Reference Number to Delete:</label>
    <input type="text" id="deleteJobRefNum" name="deleteJobRefNum" required />
    <button type="submit">Delete EOI</button>
    </form>
    <h2>Update EOI Status</h2>
    <form method="POST" action="manage.php">
    <label for="eoi_id">EOI ID:</label>
    <input type="text" id="eoi_id" name="eoi_id" required />
    <label for="new_status">New Status:</label>
    <select id="new_status" name="new_status" required>
        <option value="New">New</option>
        <option value="Current">Current</option>
        <option value="Final">Final</option>
    </select>
    <button type="submit" name="updateStatus">Update Status</button>
</form>
</body>
</html>
