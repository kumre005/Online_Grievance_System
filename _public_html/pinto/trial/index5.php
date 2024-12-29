<?php
 session_start();
include('../include/config.php');
// Define an array to store priority values and their corresponding days
$priorityDays = array(
    "P1" => 2,
    "P2" => 4,
    "P3" => 7,
    "P4" => 15
);

// SQL query to fetch rows based on priority and days
$query = "
    SELECT *
    FROM tblcomplaints
    WHERE
        RegDate < NOW() - INTERVAL ? DAY AND
        state != 'closed' AND
        priority = ?
";

// Prepare the statement
$stmt = $con->prepare($query);

if ($stmt) {
    // Bind parameters and execute the query for each priority and days combination
    foreach ($priorityDays as $priority => $days) {
        $stmt->bind_param("is", $days, $priority);
        $stmt->execute();

        $result = $stmt->get_result();

	

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Process each row here
				
                echo "Priority: $priority - Complaint ID: " . $row["complaintNumber"] . " - State: " . $row["state"] . " - nic: " . $row["noc"] . "<br>";
            }
        } else {
            echo "No rows found for priority: $priority<br>";
        }
    }

    $stmt->close();
} else {
    echo "Statement preparation error: " . $con->error;
}

$con->close();

?>
